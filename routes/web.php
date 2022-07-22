<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SeccionStudentController;
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

Route::get('events/{event}',[EventController::class,'show'])->name('events.show');

//Route::resource('registers', RegisterController::class)->names('registers'); 

//Route::get('registers/{event}',[RegisterController::class,'show'])->name('registers.show');

//Route::post('registers',[RegisterController::class,'store'])->name('registers.store');


Route::resource('students', StudentController::class)->names('students'); 

Route::post('/ingresar', [StudentController::class, 'ingresar'])->name('ingresar');


//Route::post('/ingresar', [SeccionStudentController::class, 'ingresar'])->name('ingresar');
