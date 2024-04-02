<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Nette\Schema\ValidationException;

final class CreateShipmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['bail', 'required', 'numeric', 'max:100'],
            'product_combination_id' => ['bail', 'required', 'numeric', 'max:100'],
            'receiver_contact_data' => ['bail', 'required', 'array'],
        ];
    }

    public function getProductId(): int
    {
        return (int)$this->get('product_id');
    }

    public function getProductCombinationId(): int
    {
        return (int)$this->get('product_combination_id');
    }

    public function getReceiverContactData(): array
    {
        return [
            "company_name" => "test",
            "name" => "test",
            "street" => "test",
            "house_number" => 12,
            "postal_code" => "3318AM",
            "locality" => "Dordrecht",
            "country" => "NL",
            "email" => "test@test.nl"
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException('hoi');
    }
}
