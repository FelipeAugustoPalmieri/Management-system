<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\EconomicGroupController;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('collaborators/report', [CollaboratorController::class, 'report'])->name('collaborators.report');
Route::get('collaborators/export', [CollaboratorController::class, 'export'])->name('collaborators.export');
Route::get('audits', [AuditController::class, 'showAudits'])->name('audits.index');

Route::resource('economic-groups', EconomicGroupController::class);
Route::resource('flags', FlagController::class);
Route::resource('units', UnitController::class);
Route::resource('collaborators', CollaboratorController::class);
