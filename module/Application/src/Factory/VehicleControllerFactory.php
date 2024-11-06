<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Application\Service\VehicleService;
use Application\Controller\VehicleController;

class VehicleControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $vehicleService = $container->get(VehicleService::class);
        return new VehicleController($vehicleService);
    }
}