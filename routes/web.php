<?php

use App\Http\Controllers\EconomicGroupController;
use App\Http\Controllers\FlagController;
use Illuminate\Support\Facades\Route;

Route::resource('economic-groups', EconomicGroupController::class);
Route::resource('flags', FlagController::class);

