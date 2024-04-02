<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\Factories\ReceiverContactFactory as ReceiverContactFactoryContract;
use App\Dtos\ReceiverContact;

/**
 * @method ReceiverContact getDto()
 */
final class ReceiverContactFactory extends AbstractDtoFactory implements ReceiverContactFactoryContract
{
    protected static string $classFqn = ReceiverContact::class;

    public function create(array $receiverContactData): ReceiverContact
    {
        $receiverContact = $this->getDto();
        $receiverContact->setCountry($receiverContactData['country']);
        $receiverContact->setEmail($receiverContactData['email']);
        $receiverContact->setName($receiverContactData['name']);
        $receiverContact->setLocality($receiverContactData['locality']);
        $receiverContact->setStreet($receiverContactData['street']);
        $receiverContact->setPostalCode($receiverContactData['postal_code']);
        $receiverContact->setCompanyName($receiverContactData['company_name']);
        $receiverContact->setHouseNumber($receiverContactData['house_number']);

        return $receiverContact;
    }
}
