<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends BlendxController
{
    public static function create(Request $request, $model, $id)
    {
        $schools = School::all();
        return view('backend.teacher.create',[
            'schools'=>$schools,
        ]);
    }

    public static function store(Request $request, $model, $id)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 'teacher';
        $user->save();
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->user_id = $user->id;
        $teacher->school_id = $request->school_id;
        $exploded_name = explode(' ', $request->name);
        $school = School::findOrFail($request->school_id);
        // First 3 Letters of City // School Short Name // Initial Letters of Name
        $first_three_city_letters = substr($school->city->name, 0, 3);
        $school_short_name = $school->short_name;
        $name_initial = '';
        foreach($exploded_name as $word){
            $name_initial = $name_initial . $word[0];
        }
        $teacher->code = strtoupper($first_three_city_letters.$school_short_name.$name_initial);
        $teacher->save();
        return redirect('/dashboard/teacher')->with('success', 'Successfully saved!');
    }

    public static function edit(Request $request, $model, $id)
    {
        $entry = $model::findOrFail($id);
        $schools = School::all();
        $route = self::model_to_route($model);
        return view('backend.'.$route.'.edit', [
            'old' => $entry,
            'schools' => $schools,
        ]);
    }


    public static function update(Request $request, $model, $id){
        
        $teacher = Teacher::findOrFail($id);
        
        //update user table
        $user = User::findOrFail($teacher->user_id);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->school_id = $request->school_id;
        $exploded_name = explode(' ', $request->name);
        $school = School::findOrFail($request->school_id);
        // First 3 Letters of City // School Short Name // Initial Letters of Name
        $first_three_city_letters = substr($school->city->name, 0, 3);
        $school_short_name = $school->short_name;
        $name_initial = '';
        foreach($exploded_name as $word){
            $name_initial = $name_initial . $word[0];
        }
        $teacher->code = strtoupper($first_three_city_letters.$school_short_name.$name_initial);
        $teacher->save();

        return redirect('/dashboard/teacher');

    }

    public static function delete(Request $request, $model, $id){
        $teacher = Teacher::findOrFail($id);
        $user = User::findOrFail($teacher->user_id);
        $teacher->delete();
        $user->delete();

        return redirect('/dashboard/teacher');
    }
}
