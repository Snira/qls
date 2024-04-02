<?php

declare(strict_types=1);

namespace App\Contracts\Factories;

use App\Dtos\Shipment;
use App\Http\Requests\CreateShipmentRequest;

interface ShipmentFactory
{
    public function create(CreateShipmentRequest $request): Shipment;
}
