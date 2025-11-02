<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Expenses\Http\Controllers\ExpenseController;

Route::apiResource('api/expenses', ExpenseController::class);
