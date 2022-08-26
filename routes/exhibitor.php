<?php

use App\Http\Controllers\Admin\ExhibitorController;
use Illuminate\Support\Facades\Route;


Route::resource('', ExhibitorController::class)->names('admin.exhibitors');