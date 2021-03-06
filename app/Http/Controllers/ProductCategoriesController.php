<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoriesController extends BlendxController
{
    public static function store(Request $request, $model, $id)
    {
        $slug = Str::slug($request->title);
        $request->merge([
            'slug' => $slug
        ]);
        return parent::store($request, $model, $id); // TODO: Change the autogenerated stub
    }
}
