<?php

use App\Http\Controllers\IssuesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IssuesController::class, 'index']);


Route::resource('issues', IssuesController::class);
