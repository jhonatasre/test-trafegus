<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Application\Service\DriverService;
use Application\Controller\DriverController;
use Application\Service\VehicleService;

class DriverControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $driverService = $container->get(DriverService::class);
        $vehicleService = $container->get(VehicleService::class);
        return new DriverController($driverService, $vehicleService);
    }
}
