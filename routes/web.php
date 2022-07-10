<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[EventController::class,'welcome'])->name('welcome');

Route::get('events/{event}',[EventController::class,'show'])->name('show');

Route::get('students/{event}',[StudentController::class,'index'])->name('index');
// Route::resource('students', EventController::class)->names('admin.students'); 
