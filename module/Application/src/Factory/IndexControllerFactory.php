<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Application\Service\DriverService;
use Application\Controller\IndexController;
use Application\Service\VehicleService;

class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $driverService = $container->get(DriverService::class);
        $vehicleService = $container->get(VehicleService::class);
        return new IndexController($driverService, $vehicleService);
    }
}
