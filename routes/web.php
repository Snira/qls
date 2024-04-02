<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::post(
    'shipments/create',
    [ShipmentController::class, 'create'],
)->name('create-shipment');
