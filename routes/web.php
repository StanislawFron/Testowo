<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleDriveController;

Route::get('/', [GoogleDriveController::class, 'displayTest']);
