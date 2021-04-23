<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public static function index(){
        $all = Testimonial::all();
        return view('backend.testimonial.index', ['all' => $all]);
    }
    public static function create(){

        return view('backend.testimonial.create');
    }

    public static function store($request, $model, $id){
        $testimonial = new Testimonial;
        $testimonial->message = $request->message;
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = $file->getClientOriginalName();
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $name = Str::camel($name);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename_to_save = $name . time() . "." . $extension;
            try{
                $file->storeAs('public/files', $filename_to_save);
                $testimonial->profile_image = 'storage/files/'.$filename_to_save;
            }catch(\Exception $e){
                array_push($errors, $e->getMessage());
            }
        }
        try{
            $testimonial->save();
            return redirect('dashboard/testimonial');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect('dashboard/testimonial/create')->with('error', $e->getMessage());
        }
    }
    public static function edit($request, $model, $id){
        $old = Testimonial::find($id);
        return view('backend.testimonial.edit',['old'=>$old]);
    }

    public static function update($request, $model, $id){
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->message = $request->message;
        $testimonial->position = $request->position;

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = $file->getClientOriginalName();
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $name = Str::camel($name);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename_to_save = $name . time() . "." . $extension;

            if ($testimonial->profile_image) {
                $storage_path = str_replace('storage','public',$testimonial->profile_image);
                Storage::delete($storage_path);
            }

            try{
                $file->storeAs('public/files', $filename_to_save);
                $testimonial->profile_image = 'storage/files/'.$filename_to_save;
            }catch(\Exception $e){
                array_push($errors, $e->getMessage());
            }
        }
        try{
            $testimonial->save();
            return redirect('dashboard/testimonial');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public static function delete($request, $model, $id){
        $testimonial = Testimonial::find($id);
        if ($testimonial->profile_image) {
            // changing path of the image
            $storage_path = str_replace('storage','public',$testimonial->profile_image);

            //deleting form storage
            Storage::delete($storage_path);
        }
        $testimonial->delete();
        return redirect('dashboard/testimonial');
    }
}
