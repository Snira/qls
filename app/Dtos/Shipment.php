<?php

declare(strict_types=1);

namespace App\Dtos;

final class Shipment
{
    private int $productId;

    private int $productCombinationId;
    private string $brandId;

    private ReceiverContact $receiverContact;


    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function setProductCombinationId(int $productCombinationId): void
    {
        $this->productCombinationId = $productCombinationId;
    }

    public function setReceiverContact(ReceiverContact $receiverContact): void
    {
        $this->receiverContact = $receiverContact;
    }

    public function setBrandId(string $brandId): void
    {
        $this->brandId = $brandId;
    }

    public function getData(): array
    {
        return [
            'brand_id' => $this->brandId,
            'reference' => 111,
            'weight' => 100,
            'cod_amount' => 0,
            'piece_total' => 1,
            'product_id' => $this->productId,
            'product_combination_id' => $this->productCombinationId,
            'receiver_contact' => $this->receiverContact->getData(),
        ];
    }
}
