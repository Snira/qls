<?php

declare(strict_types=1);

namespace App\Dtos;

final class ReceiverContact
{
    private string $companyName;
    private string $name;
    private string $street;
    private string $postalCode;
    private string $locality;
    private string $country;
    private string $email;
    private int $houseNumber;


    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getLocality(): string
    {
        return $this->locality;
    }

    public function setLocality(string $locality): void
    {
        $this->locality = $locality;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setHouseNumber(int $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    public function getData(): array
    {
        return [
            "companyname" => $this->companyName,
            "name" => $this->name,
            "street" => $this->street,
            "housenumber" => $this->houseNumber,
            "postalcode" => $this->postalCode,
            "locality" => $this->locality,
            "country" => $this->country,
            "email" => $this->email,
        ];
    }
}
