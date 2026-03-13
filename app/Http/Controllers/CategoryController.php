<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function listCategory(Request $request)
    {
        $data = Category::get();

        $dataPaginada = Category::paginate(2);
        $dataperPage = Category::paginate($request->input('per_page', 5));
        return Inertia::render(
            "Dashboard/Category/ListCategory",
            [
                "data" => $data,
                "dataPaginada" => $dataPaginada,
                "dataperPage" => $dataperPage
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

    public function deleteCategory($id)
    {
        $data = Category::findOrFail($id);
        try {
            $data->delete();

            return redirect()->back()->with('success', 'Registro eliminado correctamente');
        } catch (\Throwable $th) {
            Log::debug("Error deleteCategory " . $th->getMessage());
        }
    }
}
