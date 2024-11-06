<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Doctrine\ORM\Configuration;
use Doctrine\DBAL\Connection;

class DoctrineEntityFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $config = $container->get(Configuration::class);
        $connection = $container->get(Connection::class);

        return \Doctrine\ORM\EntityManager::create($connection, $config);
    }
}
