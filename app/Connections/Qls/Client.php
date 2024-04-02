<?php

declare(strict_types=1);

namespace App\Connections\Qls;

use App\Connections\Qls\Config\ClientConfig;
use App\Contracts\Connections\Qls\Client as ClientContract;
use App\Contracts\Connections\Qls\Exceptions\QlsApiException;
use App\Dtos\Shipment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

final class Client implements ClientContract
{
    public function __construct(
        private readonly ClientConfig $config,
        private readonly HttpClientInterface $client,
    ) {
    }

    public function createShipment(Shipment $shipment): array
    {
        $options = [
            'json' => $shipment->getData(),
        ];

        return $this->call($this->config->getCreateShipmentEndpoint(), Request::METHOD_POST, $options);
    }


    public function getShippingLabel(string $endpoint): string
    {
        return $this->client->request(Request::METHOD_GET, $endpoint, [])->getContent();
    }

    private function call(string $endpoint, string $method = Request::METHOD_GET, array $options = []): array
    {
        try {
            $response = $this->client->request($method, $endpoint, $options)->toArray();
        } catch (Throwable $e) {
            throw new QlsApiException(
                sprintf(
                    'Request failed for %s with message %s',
                    $endpoint,
                    $e->getMessage(),
                ),
                $e->getCode(),
                $e,
            );
        }

        return $response;
    }

}
