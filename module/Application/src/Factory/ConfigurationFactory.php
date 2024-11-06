<?php

namespace Application\Factory;

use Doctrine\ORM\Configuration;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ConfigurationFactory implements FactoryInterface
{
    public function __invoke()
    {
        $config = new Configuration();

        return $config;
    }
}
