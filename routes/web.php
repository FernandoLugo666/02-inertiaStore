<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });


// ************************
// Route::get('/', [PostController::class, 'index']);
Route::get('/', [InicioController::class, 'sidebar'])->name('sidebar@@');

Route::group(['prefix' => 'category'], function () {
    Route::get('/create-view', [CategoryController::class, 'createView'])->name('createView');
    Route::post('/create', [CategoryController::class, 'create'])->name('create');
    Route::get('/list-category', [CategoryController::class, 'listCategory'])->name('listCategory');
    Route::get('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::put('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::delete("/delete-category/{id}", [CategoryController::class, 'deleteCategory'])->name("deleteCategory");
    Route::get("/delete-category/{id}", [CategoryController::class, 'deleteCategory'])->name("deleteCategory");
});
