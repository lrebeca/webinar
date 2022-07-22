<?php

use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ExhibitorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrganizerController;
use App\Http\Controllers\Admin\StudentController;

//Route::get('', [HomeController::class, 'index']);

Route::get('', [HomeController::class, 'index'])->name('admin.index');

Route::resource('organizers', OrganizerController::class)->names('admin.organizers'); 
Route::resource('events', EventController::class)->names('admin.events'); 
Route::resource('exhibitors', ExhibitorController::class)->names('admin.exhibitors');
Route::resource('students', StudentController::class)->names('admin.students'); 
Route::resource('details', DetailController::class)->names('admin.details'); 
Route::resource('documents', DocumentController::class)->names('admin.documents');