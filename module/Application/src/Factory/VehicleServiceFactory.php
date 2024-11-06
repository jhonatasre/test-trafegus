<?php

namespace Application\Factory;

use Application\Service\VehicleService;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class VehicleServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new VehicleService($entityManager);
    }
}