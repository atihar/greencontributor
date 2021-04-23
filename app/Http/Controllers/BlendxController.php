<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlendxController extends Controller
{
    //Server
    public function serve(Request $request, $model, $action = 'index', $id = null)
    {
        $model_name = Str::ucfirst(Str::camel(Str::singular($model)));
        $model = self::route_to_model($model_name);
        if(!class_exists($model)){return abort(404);}
        $controller = "App\\Http\\Controllers\\BlendxController";
        $controller_plural = "App\\Http\\Controllers\\".Str::plural($model_name)."Controller";
        $controller_singular = "App\\Http\\Controllers\\".$model_name."Controller";
        if(class_exists($controller_singular)){$controller = $controller_singular;}
        if(class_exists($controller_plural)){$controller = $controller_plural;}
        return $controller::$action($request, $model, $id);
    }

    //Index
    public static function index(Request $request, $model, $id)
    {
        $all = $model::all();
        $route = self::model_to_route($model);
        return view("backend.".$route.".index", ['all' => $all]);
    }

    //Create
    public static function create(Request $request, $model, $id)
    {
        $route = self::model_to_route($model);
        return view("backend.".$route.".create");
    }

    //Store
    public static function store(Request $request, $model, $id)
    {
        $route = self::model_to_route($model);
        $inputs = $request->except('_token');
        $entry = new $model();
        foreach($inputs as $key => $input){
            if(gettype($input) == 'object'){
                $filename = $input->getClientOriginalName();
                $name = pathinfo($filename, PATHINFO_FILENAME);
                $name = Str::camel($name);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $filename_to_save = $name . time() . "." . $extension;
                try{
                    $input->storeAs('public/files', $filename_to_save);
                    $entry->$key = 'storage/files/'.$filename_to_save;
                }catch(\Exception $e){
                    array_push($errors, $e->getMessage());
                }
            }else{
                if($input == 'on'){
                    $entry->$key = true;
                    continue;
                }
                $entry->$key = $input;
            }
        }
        try{
            $entry->save();
            return redirect('/dashboard/'.$route);
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect('/dashboard/'.$route.'/create')->with('error', $e->getMessage());
        }
    }

    //Edit
    public static function edit(Request $request, $model, $id)
    {
        $entry = $model::findOrFail($id);
        $route = self::model_to_route($model);
        return view('backend.'.$route.'.edit', [
            'old' => $entry
        ]);
    }

    //update
    public static function update(Request $request, $model, $id)
    {
        // dd($request->toArray());
        $route = self::model_to_route($model);
        $entry = $model::findOrFail($id);
        $inputs = $request->except('_token');
        foreach ($inputs as $key => $input) {
            if(gettype($input) == 'object'){
                $filename = $input->getClientOriginalName();
                $name = pathinfo($filename, PATHINFO_FILENAME);
                $name = Str::camel($name);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $filename_to_save = $name . time() . "." . $extension;
                try{
                    $input->storeAs('public/files', $filename_to_save);
                    $entry->$key = 'storage/files/'.$filename_to_save;
                }catch(\Exception $e){
                    array_push($errors, $e->getMessage());
                }
            }else{
                if($input == 'on'){
                    $entry->$key = true;
                    continue;
                }
                else if($input == '0'){
                    $entry->$key = false;
                }
                $entry->$key = $input;
                
            }
        }
        try{
            $entry->save();
            return redirect('/dashboard/'.$route);
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect('/dashboard/'.$route.'/create')->with('error', $e->getMessage());
        }
    }


    //Destroy
    public static function destroy(Request $request, $model, $id)
    {
        $route = self::model_to_route($model);
        $entry = $model::findOrFail($id);
        try{
            // dd($entry);
            $entry->delete();
            return redirect('/dashboard/'.$route)->with('success', 'Successfully Deleted!');
        }catch(\Exception $e){
            return redirect('/dashboard/'.$route)->with('error', [$e->getMessage()]);
        }
    }

    // Delete
    public static function delete(Request $request, $model, $id){
        
        return self::destroy($request, $model, $id);
    }

    //RouteToModel
    public static function route_to_model($route)
    {
        $model_name = Str::ucfirst(Str::camel(Str::singular($route)));
        return "App\\Models\\".$model_name;
    }

    //ModelToRoute
    public static function model_to_route($model)
    {
        $exploded_model = explode('\\', $model);
        $model_name = $exploded_model[count($exploded_model)-1];
        return Str::snake($model_name);
    }
}
