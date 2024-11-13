<?php

use App\Http\Controllers\EconomicGroupController;
use Illuminate\Support\Facades\Route;

Route::resource('economic-groups', EconomicGroupController::class);
