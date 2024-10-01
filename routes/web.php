<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/halo', function () {
    return "Ini return dari route tanpa view";
});

Route::get('/hello/index', [FirstController::class, 'index']);

Route::get('/hello/index2/{param}', [FirstController::class, 'index2']);

Route::get('/hello/index3/{param?}', [FirstController::class, 'index3']);

Route::get('/hello/index4/{param1}/{param2?}', [FirstController::class, 'index4']);

// Route::get('/home', function () {
//     return view('home', ['kelas' => "Web Frameworks", 'jurusan' => "Informatika"]);
// });

Route::get('/home', function () {
    return view('home', ['display' => "hai"]);
});

Route::get('/home/index/{param1?}/{param2?}', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/post', [PostController::class, 'index'])->name('post');

Route::get('/base', function () {
    return view('base');
});

Route::get('/tail', function () {
    return view('tail');
});

Route::get('/courses', function () {
    return view('courses', ['courses' => Course::all()]);
})->name('courses');

Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('course/insert', [CourseController::class, 'insert'])->name('course.insert');

Route::get('/course/view/{course:id}', [CourseController::class, 'show']);

