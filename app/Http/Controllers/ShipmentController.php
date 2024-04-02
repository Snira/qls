<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Connections\Qls\Client;
use App\Contracts\Factories\ShipmentFactory;
use App\Http\Requests\CreateShipmentRequest;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ShipmentController extends AbstractApiController
{
    public function __construct(
        ResponseFactory $responseFactory,
        private readonly Client $client,
        private readonly ShipmentFactory $shipmentFactory,
//        private readonly Filesystem $filesystem,
    ) {
        parent::__construct($responseFactory);
    }

    public function create(CreateShipmentRequest $request): JsonResponse
    {
        $shipment = $this->shipmentFactory->create($request);
        $response = $this->client->createShipment($shipment);
        $fileContents = $this->client->getShippingLabel($response['data']['labels']['a4']['offset_0']);
//        $this->filesystem->put($response['data']['id'] . '_' . 'shipping_label', $fileContents);
        //Then create seperate endpoint (shipping-label/{shipmentId}) which combines saved label with summary of products


        return $this->buildSuccessResponse(statusCode: Response::HTTP_CREATED);
    }
}
