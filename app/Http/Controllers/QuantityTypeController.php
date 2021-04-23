<?php

namespace App\Http\Controllers;

use App\Models\QuantityType;
use Illuminate\Http\Request;

class QuantityTypeController extends BlendxController
{
    public static function store(Request $request, $model, $id)
    {
        $quantity_type = new QuantityType();
        $quantity_type->title = $request->title;
        $quantity_type->save();
        if($request->default)
        {
            self::make_default($request, $model, $quantity_type->id);
        }
        return redirect('/dashboard/quantity_type');
    }

    public static function make_default(Request $request, $model, $id)
    {
        $all_quantity_types = QuantityType::all();
        foreach ($all_quantity_types as $quantity_type)
        {
            $quantity_type->default = false;
            $quantity_type->save();
        }
        $quantity_type = QuantityType::findOrFail($id);
        $quantity_type->default = true;
        $quantity_type->save();
        return redirect('/dashboard/quantity_types');
    }
}
