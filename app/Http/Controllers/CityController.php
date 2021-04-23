<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CityController extends BlendxController
{
    public static function update(Request $request, $model, $id){
        $city = City::find($id);
        $city->name = $request->name;
        $city->country = $request->country;
        $city->timezone = $request->timezone;
        $city->description = $request->description;

        if ($request->hasFile('landscape_photo')) {
            $file = $request->file('landscape_photo');
            $filename = $file->getClientOriginalName();
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $name = Str::camel($name);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename_to_save = $name . time() . "." . $extension;

            if ($city->landscape_photo) {
                $storage_path = str_replace('storage','public',$city->landscape_photo);
                Storage::delete($storage_path);
            }

            try{
                $file->storeAs('public/files', $filename_to_save);
                $city->landscape_photo = 'storage/files/'.$filename_to_save;
            }catch(\Exception $e){
                array_push($errors, $e->getMessage());
            }
        }
        try{
            $city->save();
            return redirect('dashboard/city');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public static function delete(Request $request, $model, $id){
        $route = self::model_to_route($model);
        $entry = $model::findOrFail($id);
        if ($entry->landscape_photo) {
            // changing path of the image
            $storage_path = str_replace('storage','public',$entry->landscape_photo);

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
