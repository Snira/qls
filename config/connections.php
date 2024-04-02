<?php

declare(strict_types=1);

use App\Enums\Connection;

return [
    Connection::QLS => [
        'base_url' => 'https://api.pakketdienstqls.nl',
        'credentials' => [
            'username' => 'frits@test.qlsnet.nl',
            'password' => '4QJW9yh94PbTcpJGdKz6egwH',
        ],
        'endpoints' => [
            'create_shipment' => '/company/9e606e6b-44a4-4a4e-a309-cc70ddd3a103/shipment/create',
        ],
    ],
];
