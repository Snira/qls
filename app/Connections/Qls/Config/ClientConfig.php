<?php

declare(strict_types=1);

namespace App\Connections\Qls\Config;

use App\Contracts\Connections\Qls\Config\ClientConfig as ClientConfigContract;

final class ClientConfig implements ClientConfigContract
{
    public function __construct(
        private readonly string $createShipmentEndpoint,
    ) {
    }

    public function getCreateShipmentEndpoint(): string
    {
        return $this->createShipmentEndpoint;
    }
}
