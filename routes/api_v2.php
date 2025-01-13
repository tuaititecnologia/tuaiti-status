<?php

use App\Http\Controllers\Api\V2\VirtualMachineStatusController;
use Illuminate\Support\Facades\Route;

Route::apiResource('virtual_machine_statuses', VirtualMachineStatusController::class);
