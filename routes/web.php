<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/test/{google_document_number}/{number_of_answers}/{type}', [TestController::class, 'show']);

//http://localhost:8000/test/10I3OiNUYWvwXBGNnYlUWb7YQ46rmTQRK8YWcKH7_wyY/4/checkbox
