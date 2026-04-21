<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GeneralController;
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

Route::group(['prefix' => 'post'], function () {
    Route::get('/post-list', [PostController::class, 'postList'])->name('postList');
    Route::get('/create-post', [PostController::class, 'createPost'])->name('createPost');
    Route::post('/create-post', [PostController::class, 'createPost'])->name('createPost');
    Route::get('/update-post/{id}',  [PostController::class, 'updatePost'])->name('updatePost');
    Route::put('/update-post/{id}',  [PostController::class, 'updatePost'])->name('updatePost');
    Route::post('/update-post/{id}',  [PostController::class, 'updatePost'])->name('updatePost');
    Route::delete('/delete-post/{id}', [PostController::class, 'deletePost'])->name('deletePost');
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/general', [GeneralController::class, 'generalTable'])->name('generalTable');
    Route::get('/create', [GeneralController::class, 'crearContacto'])->name('crearContacto');
    Route::post('/create', [GeneralController::class, 'crearContacto'])->name('crearContacto');
    Route::get('/update-contact/{id}', [GeneralController::class, 'updateContact'])->name('updateContact');
    Route::put('/update-contact/{id}', [GeneralController::class, 'updateContact'])->name('updateContact');
});


Route::group(['prefix' => 'company'], function () {
    Route::get('/list-company', [CompanyController::class, 'listCompany'])->name("listCompany");
    Route::get('/create-company', [CompanyController::class, 'createCompany'])->name("createCompany");
    Route::post('/create-company', [CompanyController::class, 'createCompany'])->name("createCompany");
    Route::get('/update-company/{id}', [CompanyController::class, 'updateCompany'])->name("updateCompany");
    Route::put('/update-company/{id}', [CompanyController::class, 'updateCompany'])->name("updateCompany");
});
