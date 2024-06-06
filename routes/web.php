<?php

use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/test/{google_document_number}/{number_of_answers}/{type}', [TestController::class, 'show'])->name('test.show');

//http://localhost:8000/test/10I3OiNUYWvwXBGNnYlUWb7YQ46rmTQRK8YWcKH7_wyY/4/checkbox

Route::get('/', [TestController::class, 'index']);

Route::get('/documentation', [DocumentationController::class, 'index']);
