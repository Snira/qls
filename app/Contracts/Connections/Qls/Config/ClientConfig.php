<?php

declare(strict_types=1);

namespace App\Contracts\Connections\Qls\Config;

interface ClientConfig
{
    public function getCreateShipmentEndpoint(): string;
}
