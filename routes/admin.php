<?php

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\EventController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OrganizerController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Student\AprobadoController;
use App\Http\Controllers\Admin\Student\EnviadoController;
use App\Http\Controllers\Admin\Student\RechazadoController;
use App\Http\Controllers\Admin\UserController;

//Route::get('', [HomeController::class, 'index']);

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('admin.index');

Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('users', UserController::class)->only('index', 'edit', 'update', 'destroy')->names('admin.users');
Route::resource('organizers', OrganizerController::class)->names('admin.organizers');
Route::resource('provinces',ProvinceController::class)->names('admin.provinces');
Route::resource('events', EventController::class)->names('admin.events');
Route::resource('details', DetailController::class)->names('admin.details');
Route::resource('images', ImageController::class)->names('admin.images');
Route::resource('documents', DocumentController::class)->names('admin.documents');
Route::resource('certificates', CertificateController::class)->names('admin.certificates');

// Rutas para todos los botones que estan en el listado de los eventos en general 

Route::get('events/detalles/{event}',[EventController::class,'detalles'])->name('admin.events.detalles');
Route::get('events/documentos/{event}',[EventController::class,'documentos'])->name('admin.events.documentos');
Route::get('events/certificado/{event}',[EventController::class,'certificado'])->name('admin.events.certificado');

// Participantes pendientes de aprobacion 

Route::get('enviado',[EnviadoController::class,'index'])->name('admin.students.enviado.index');
Route::get('enviado/edit/{student}',[EnviadoController::class,'edit'])->name('admin.students.enviado.edit');
Route::put('enviado/update/{student}',[EnviadoController::class,'update'])->name('admin.students.enviado.update');
Route::delete('enviado/destroy/{student}',[EnviadoController::class,'destroy'])->name('admin.students.enviado.destroy');


// Participantes aprobados 

Route::get('aprobado',[AprobadoController::class,'index'])->name('admin.students.aprobado.index');
Route::get('aprobado/edit/{student}',[AprobadoController::class,'edit'])->name('admin.students.aprobado.edit');
Route::put('aprobado/update/{student}',[AprobadoController::class,'update'])->name('admin.students.aprobado.update');
Route::delete('aprobado/destroy/{student}',[AprobadoController::class,'destroy'])->name('admin.students.aprobado.destroy');

// Participantes rechazados 

Route::get('rechazado',[RechazadoController::class,'index'])->name('admin.students.rechazado.index');
Route::get('rechazado/edit/{student}',[RechazadoController::class,'edit'])->name('admin.students.rechazado.edit');
Route::put('rechazado/update/{student}',[RechazadoController::class,'update'])->name('admin.students.rechazado.update');
Route::delete('rechazado/destroy/{student}',[RechazadoController::class,'destroy'])->name('admin.students.rechazado.destroy');

// Rutas donde la administradora puede aprobar o rechazar a los participantes 

Route::post('enviado/{student}/aprobar', [EnviadoController::class, 'aprobar'])->name('admin.students.enviado.aprobar');
Route::post('rechazado/{student}/rechazar', [EnviadoController::class, 'rechazar'])->name('admin.students.rechazado.rechazar');

// Rutas de los botones que se encuentran en el listado de los eventos donde se  muestran los estudiantes aprobados, pendientes y rechazados

Route::get('events/aprobados/{event}',[EventController::class,'aprobados'])->name('admin.events.aprobados');
Route::get('events/pendientes/{event}',[EventController::class,'pendientes'])->name('admin.events.pendientes');
Route::get('events/rechazados/{event}',[EventController::class,'rechazados'])->name('admin.events.rechazados');

