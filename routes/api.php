<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'v1'],
    static function (): void {
        Route::post(
            'shipments/create',
            [ShipmentController::class, 'create'],
        )->name('create-shipment');
    }
);
