<?php

namespace App\Providers;

use App\Connections\Qls\Client;
use App\Connections\Qls\Config\ClientConfig;
use App\Connections\Qls\Config\Credential;
use App\Contracts\Connections\Qls\Client as ClientContract;
use App\Contracts\Connections\Qls\Config\ClientConfig as ClientConfigContract;
use App\Contracts\Factories\ReceiverContactFactory as ReceiverContractFactoryContract;
use App\Contracts\Factories\ShipmentFactory as ShipmentFactoryContract;
use App\Enums\Connection;
use App\Factories\ReceiverContactFactory;
use App\Factories\ShipmentFactory;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpClient\HttpClient;

final class AppServiceProvider extends ServiceProvider
{
    private static array $factoryBindings = [
        ReceiverContractFactoryContract::class => ReceiverContactFactory::class,
        ShipmentFactoryContract::class => ShipmentFactory::class,
    ];

    public function register(): void
    {
        $this->registerFactories();

        $this->app->singleton(
            ClientConfigContract::class,
            function (): ClientConfigContract {
                return new ClientConfig(
                    $this->getConfigRepository()->get('connections.' . Connection::QLS . '.endpoints.create_shipment'),
                );
            },
        );

        $this->app->singleton(
            ClientContract::class,
            function (): ClientContract {
                $credentials = $this->getCredentials();

                $options = [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'timeout' => $this->app->runningInConsole() ? 30 : 10,
                    'base_uri' => $this->getConfigRepository()->get('connections.' . Connection::QLS . '.base_url'),
                    'auth_basic' => $credentials->getUsername() . ':' . $credentials->getPassword(),
                ];

                return new Client(
                    $this->app->make(ClientConfigContract::class),
                    HttpClient::create($options),
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function getCredentials(): Credential
    {
        $credentials = $this->getConfigRepository()->get('connections.' . Connection::QLS . '.credentials');

        return new Credential(
            $credentials['username'],
            $credentials['password'],
        );
    }

    private function getConfigRepository(): ConfigRepository
    {
        return $this->app->make(ConfigRepository::class);
    }

    private function registerFactories(): void
    {
        foreach (self::$factoryBindings as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }
}
