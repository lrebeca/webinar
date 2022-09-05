<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController;
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

Route::get('/',[EventController::class,'index'])->name('index');

Route::get('events/{event}',[EventController::class,'show'])->name('events.show');


Route::resource('students', StudentController::class)->names('students'); 

// Route::post('students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('students/{event}', [StudentController::class], 'show')->name('students.show');
//Route::post('/ingresar', [StudentController::class, 'ingresar'])->name('ingresar');
Route::post('/ingresar', [EventController::class, 'ingresar'])->name('ingresar');

Route::get('certificado/{student}', [StudentController::class, 'certificado'])->name('certificado');