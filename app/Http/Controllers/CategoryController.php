<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function createView()
    {
        return Inertia::render('Dashboard/Category/Create');
    }

    public function create(CategoryRequest $request)
    {
        Category::create([
            'title' => $request->title,
            'slug' => $request->slug
        ]);
    }


    public function listCategory()
    {
        $data = Category::get();

        return Inertia::render(
            "Dashboard/Category/ListCategory",
            [
                "data" => $data
            ]
        );
    }

    public function updateCategory(Request $request, $id)
    {

        $data = Category::findOrFail($id);
        if ($request->isMethod('PUT')) {
            $data->update([
                'title' => $request->title,
                'slug'  => $request->slug,
                'text'  => $request->text,
            ]);
        }

        return Inertia::render('Dashboard/Category/UpdateCategory', ["data" => $data]);
    }
}
