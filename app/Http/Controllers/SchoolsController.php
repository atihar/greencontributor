<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class SchoolsController extends BlendxController
{
    // Override Create
    public static function create(Request $request, $model, $id)
    {
        $cities = City::all();
        return view('backend.school.create', ['cities' => $cities]);
    }
    public static function edit(Request $request, $model, $id)
    {
        $entry = $model::findOrFail($id);
        $cities = City::all();
        $route = self::model_to_route($model);
        return view('backend.'.$route.'.edit', [
            'old' => $entry,
            'cities' => $cities,
        ]);
    }
}
