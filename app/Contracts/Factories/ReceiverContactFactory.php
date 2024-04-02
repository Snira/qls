<?php

declare(strict_types=1);

namespace App\Contracts\Factories;

use App\Dtos\ReceiverContact;

interface ReceiverContactFactory
{
    public function create(array $receiverContactData): ReceiverContact;
}
