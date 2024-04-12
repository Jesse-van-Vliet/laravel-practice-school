<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Open as Open;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Open\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::get('projects', [\App\Http\controllers\open\ProjectController::class, 'index'])->name('open.projects.index');


Route::group(['middleware' => ['role:teacher|admin|student']], function(){
    Route::get('/admin/projects/{project}/delete}', [Admin\ProjectController::class, 'delete'])->name('projects.delete');
    Route::resource('/admin/projects', Admin\ProjectController::class);
//    Route::get('/admin/tasks/{task}/delete}', [Admin\TaskController::class, 'delete'])->name('tasks.delete');
    Route::resource('/admin/tasks', Admin\TaskController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

});

Route::resource('/admin/tasks', Admin\TaskController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
