<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends BlendxController
{
    public static function update(Request $request, $model, $id){
        $slider = Slider::find($id);

        if ($request->hasFile('link')) {
            $file = $request->file('link');
            $filename = $file->getClientOriginalName();
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $name = Str::camel($name);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename_to_save = $name . time() . "." . $extension;

            if ($slider->link) {
                $storage_path = str_replace('storage','public',$slider->link);
                Storage::delete($storage_path);
            }

            try{
                $file->storeAs('public/files', $filename_to_save);
                $slider->link = 'storage/files/'.$filename_to_save;
            }catch(\Exception $e){
                array_push($errors, $e->getMessage());
            }
        }
        try{
            $slider->save();
            return redirect('dashboard/slider');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public static function delete(Request $request, $model, $id){
        $route = self::model_to_route($model);
        $entry = $model::findOrFail($id);
        if ($entry->link) {
            // changing path of the image
            $storage_path = str_replace('storage','public',$entry->link);

            //deleting form storage
            Storage::delete($storage_path);
        }
        try{
            $entry->delete();
            return redirect('/dashboard/'.$route)->with('success', 'Successfully Deleted!');
        }catch(\Exception $e){
            return redirect('/dashboard/'.$route)->with('error', [$e->getMessage()]);
        }
    }
}
