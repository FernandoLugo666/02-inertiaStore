<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Throwable;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render("Dashboard/Post/Index");
    }

    public function postList()
    {
        $data = Post::get();
        return Inertia::render("Dashboard/Post/PostList", ["data" => $data]);
    }

    public function createPost(PostRequest $request)
    {
        if ($request->isMethod('POST')) {
            try {
                // dd($request->all());

                Post::create([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'date' => $request->date,
                    'description' => $request->description,
                ]);
                return redirect()->back()->with('success', 'Post creado correctamente');
            } catch (Throwable $th) {
                Log::debug("Error createPost " . $th->getMessage());
                return redirect()->back()->with('error', 'NO se creó el post');
            }
        }
        return Inertia::render("Dashboard/Post/CreatePost");
    }
}
