<?php

declare(strict_types=1);

namespace App\Factories;

use Illuminate\Contracts\Container\Container;
use InvalidArgumentException;

abstract class AbstractDtoFactory
{
    protected static string $classFqn;

    public function __construct(private readonly Container $container)
    {
        if (!isset(static::$classFqn)) {
            throw new InvalidArgumentException('$classFqn has not been set');
        }
    }

    protected function getDto(): object
    {
        return $this->instantiate();
    }

    private function instantiate(): object
    {
        return $this->container->make(static::$classFqn);
    }
}
