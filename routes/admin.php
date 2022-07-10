<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ExhibitorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UnitController;

//Route::get('', [HomeController::class, 'index']);

Route::get('', [HomeController::class, 'index'])->name('admin.index');

Route::resource('provinces', ProvinceController::class)->names('admin.provinces'); 
Route::resource('units', UnitController::class)->names('admin.units'); 
Route::resource('events', EventController::class)->names('admin.events'); 
Route::resource('exhibitors', ExhibitorController::class)->names('admin.exhibitors'); 


Route::resource('students', StudentController::class)->names('admin.students'); 