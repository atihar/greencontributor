<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use Illuminate\Http\Request;

class VideosController extends BlendxController
{
    public static function create(Request $request, $model, $id)
    {
        $video_categories = VideoCategory::all();
        return view('backend.video.create', ['video_categories' => $video_categories]);
    }
}
