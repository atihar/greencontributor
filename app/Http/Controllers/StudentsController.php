<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends BlendxController
{

    public static function create(Request $request, $model, $id)
    {
        $schools = School::all();
        return view('backend.student.create', ['schools' => $schools]);
    }

    public static function store(Request $request, $model, $id)
    {
        // Register User
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 'student';
        $user->save();

        // Save Student
        $student = new Student();
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->user_id = $user->id;
        $student->school_id = $request->school_id;
        $exploded_name = explode(' ', $request->name);
        $school = School::findOrFail($request->school_id);
        // First 3 Letters of City // School Short Name // Initial Letters of Name
        $first_three_city_letters = substr($school->city->name, 0, 3);
        $school_short_name = $school->short_name;
        $name_initial = '';
        foreach($exploded_name as $word){
            $name_initial = $name_initial . $word[0];
        }
        $student->code = strtoupper($first_three_city_letters.$school_short_name.$name_initial).mt_rand(100,999);
        $student->save();
        // Return Response
        return redirect('/dashboard/student')->with('success', 'Successfully Saved!');
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
        
        $student = Student::findOrFail($id);
        
        //update user table
        $user = User::findOrFail($student->user_id);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->school_id = $request->school_id;
        $exploded_name = explode(' ', $request->name);
        $school = School::findOrFail($request->school_id);
        // First 3 Letters of City // School Short Name // Initial Letters of Name
        $first_three_city_letters = substr($school->city->name, 0, 3);
        $school_short_name = $school->short_name;
        $name_initial = '';
        foreach($exploded_name as $word){
            $name_initial = $name_initial . $word[0];
        }
        $student->code = strtoupper($first_three_city_letters.$school_short_name.$name_initial).mt_rand(100,999);
        $student->save();

        return redirect('/dashboard/student');

    }

    public static function delete(Request $request, $model, $id){
        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);
        $student->delete();
        $user->delete();

        return redirect('/dashboard/student');
    }
}
