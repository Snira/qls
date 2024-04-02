<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\Factories\ReceiverContactFactory;
use App\Contracts\Factories\ShipmentFactory as ShipmentFactoryContract;
use App\Dtos\Shipment;
use App\Http\Requests\CreateShipmentRequest;
use Illuminate\Contracts\Container\Container;

/**
 * @method Shipment getDto()
 */
final class ShipmentFactory extends AbstractDtoFactory implements ShipmentFactoryContract
{
    private const BRAND_ID = 'e41c8d26-bdfd-4999-9086-e5939d67ae28';
    protected static string $classFqn = Shipment::class;

    public function __construct(Container $container, private readonly ReceiverContactFactory $receiverContactFactory)
    {
        parent::__construct($container);
    }

    public function create(CreateShipmentRequest $request): Shipment
    {
        $shipment = $this->getDto();
        $shipment->setProductId($request->getProductId());
        $shipment->setProductCombinationId($request->getProductCombinationId());
        $shipment->setReceiverContact($this->receiverContactFactory->create($request->getReceiverContactData()));
        $shipment->setBrandId(self::BRAND_ID);

        return $shipment;
    }
}
