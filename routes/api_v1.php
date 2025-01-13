<?php

use App\Http\Controllers\Api\V1\VirtualMachineController;
use App\Http\Controllers\Api\V1\VirtualMachineStatusController;
use Illuminate\Support\Facades\Route;

Route::apiResource('virtual_machines', VirtualMachineController::class);
Route::apiResource('virtual_machines.statuses', VirtualMachineStatusController::class);
