<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intro;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class IntroController extends BlendxController
{
    public static function update($request, $model, $id){
        $intro = Intro::find($id);

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $name = Str::camel($name);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename_to_save = $name . time() . "." . $extension;

            if ($intro->video) {
                $storage_path = str_replace('storage','public',$intro->video);
                Storage::delete($storage_path);
            }

            try{
                $file->storeAs('public/files', $filename_to_save);
                $intro->video = 'storage/files/'.$filename_to_save;
            }catch(\Exception $e){
                array_push($errors, $e->getMessage());
            }
        }
        try{
            $intro->save();
            return redirect('dashboard/intro');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public static function delete(Request $request, $model, $id){
        $intro = Intro::findorfail($id);
        if ($intro->video) {
            // changing path of the image
            $storage_path = str_replace('storage','public',$intro->video);

            //deleting form storage
            Storage::delete($storage_path);
        }
        $intro->delete();
        return redirect('dashboard/intro');
    }
}
