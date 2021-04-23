<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Student;
use Illuminate\Http\Request;

class EventsController extends BlendxController
{
    public static function create(Request $request, $model, $id){
        $cities = City::all();
        return view('backend.event.create', ['cities' => $cities]);
    }
    public static function edit(Request $request, $model, $id){
        $cities = City::all();
        $entry = $model::findOrFail($id);
        $route = self::model_to_route($model);
        return view('backend.'.$route.'.edit', [
            'old' => $entry,
            'cities'=>$cities
        ]);
    }
    public static function join(Request $request)
    {
        $student_code = $request->student_id;
        $student = Student::where('code', $student_code)->first();
        if($student){
            return json_encode(['success' => "true"]);
        }else{
            return json_encode(['success' => "false"]);
        }
    }
}
