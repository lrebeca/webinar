<?php

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\EventController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OrganizerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Image;

//Route::get('', [HomeController::class, 'index']);

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('admin.index');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('users', UserController::class)->only('index', 'edit', 'update', 'destroy')->names('admin.users');

Route::resource('organizers', OrganizerController::class)->names('admin.organizers');
Route::resource('events', EventController::class)->names('admin.events');

Route::resource('students', StudentController::class)->names('admin.students');

// Route::get('students', [StudentController::class, 'enviado'])->name('admin.students.enviado');
// Route::get('students', [StudentController::class, 'aprobado'])->name('admin.students.aprobado');
// Route::get('students', [StudentController::class, 'rechazado'])->name('admin.students.rechazado');
// Route::get('students/create', [StudentController::class, 'create'])->name('admin.students.create');
// Route::post('students/store', [StudentController::class, 'store'])->name('admin.students.store');
// Route::get('students/show/{student}', [StudentController::class, 'show'])->name('admin.students.show');
// Route::get('students/edit/{student}', [StudentController::class, 'edit'])->name('admin.students.edit');
// Route::put('students/update/{student}', [StudentController::class, 'update'])->name('admin.students.update');

Route::resource('details', DetailController::class)->names('admin.details');

Route::resource('documents', DocumentController::class)->names('admin.documents');
Route::resource('certificates', CertificateController::class)->names('admin.certificates');
Route::resource('images', ImageController::class)->names('admin.images');