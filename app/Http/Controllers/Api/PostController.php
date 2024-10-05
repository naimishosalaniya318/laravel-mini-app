<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        foreach ($posts as $post) {
            if ($post->image) {
                $post->image = my_asset($post->image);
            }
        }
        return response()->json($posts, 201);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $newFileName = rand(10000000000, 9999999999) . date("YmdHis") . "." . $extension;
            $imagePath = "/image/$newFileName";
            Storage::disk('s3')->put($imagePath, file_get_contents($request->file('image')));
        }

        $post = Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return response()->json($post, 201);
    }
}
