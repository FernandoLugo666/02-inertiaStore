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
        //dd($request->all());
        Category::create([
            'title' => $request->title,
            'slug' => $request->slug
        ]);
    }
}
