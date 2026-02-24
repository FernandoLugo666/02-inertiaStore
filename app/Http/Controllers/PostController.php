<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\StorageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

    public function createPost(PostRequest $request, StorageService $storageService)
    {
        if ($request->isMethod('POST') || $request->isMethod('PUT')) {
            try {

                $imagePath = null;

                if ($request->hasFile('image')) {
                    $imagePath = $storageService->saveImage(
                        $request->file('image')
                    );
                }

                Post::create([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'date' => $request->date,
                    'description' => $request->description,
                    'image' => $imagePath,
                ]);

                return redirect()->back()->with('success', 'Post creado correctamente');
            } catch (Throwable $th) {

                Log::debug("Error createPost " . $th->getMessage());

                return redirect()->back()->with('error', 'NO se creó el post');
            }
        }

        return Inertia::render("Dashboard/Post/CreatePost");
    }

    public function updatePost(PostRequest $request, $id)
    {
        $data = Post::findOrFail($id);

        if ($request->isMethod('PUT') || $request->isMethod('POST')) {
            try {
                $data->update([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'date' => $request->date,
                    'description' => $request->description,
                ]);

                Log::debug('Succes updatePost');
                return redirect()->back()->with('success', 'Se actualizó el Post correctamente');
            } catch (Throwable $th) {
                Log::debug('Error updatePost ' . $th->getMessage());
                return redirect()->back()->with('error', 'NO se pudo actualizar el Post');
            }
        }

        return Inertia::render("Dashboard/Post/UpdatePost", ["data" => $data]);
    }

    public function deletePost($id)
    {
        $data = Post::findOrFail($id);

        if ($data) {
            // "image" => "files/20260224061949_WhatsApp Image Mapa.jpeg"
            if ($data->image) {
                //Evaluo si el archivo existe en el disco public
                if (Storage::disk('public')->exists($data->image)) {
                    // Si existe, eliminalo
                    Storage::disk('public')->delete($data->image);
                }
            }
            try {
                $data->delete();
                Log::debug('Success deletePost');
                return redirect()->back()->with('success', 'Se eliminó el Post correctamente');
            } catch (Throwable $th) {
                Log::debug('Error deletePost ' . $th->getMessage());
                return redirect()->back()->with('error', 'NO se pudo eliminar el Post');
            }
        }
    }
}
