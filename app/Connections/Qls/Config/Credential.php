<?php

declare(strict_types=1);

namespace App\Connections\Qls\Config;

use Assert\Assert;

final class Credential
{
    public function __construct(private readonly string $username, private readonly string $password)
    {
        Assert::that($username)->notBlank('$username cannot be blank');
        Assert::that($password)->notBlank('$password cannot be blank');
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
