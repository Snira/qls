<?php

declare(strict_types=1);

namespace App\Contracts\Connections\Qls;

use App\Dtos\Shipment;

interface Client
{
    public function createShipment(Shipment $shipment): array;

    public function getShippingLabel(string $endpoint): string;
}
