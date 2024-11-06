<?php

namespace Application\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Doctrine\DBAL\DriverManager;

class DoctrineConnectionFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $params = [
            'dbname' => 'docker',
            'user' => 'root',
            'password' => 'root',
            'host' => 'database',
            'driver' => 'pdo_mysql',
        ];

        return DriverManager::getConnection($params);
    }
}
