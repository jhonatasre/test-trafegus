<?php

namespace Application\Factory;

use Application\Service\DriverService;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class DriverServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new DriverService($entityManager);
    }
}