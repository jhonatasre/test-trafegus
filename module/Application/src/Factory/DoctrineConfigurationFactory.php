<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Doctrine\ORM\Configuration as DoctrineConfiguration;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;

class DoctrineConfigurationFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $config = new DoctrineConfiguration();

        $annotationDriver = new AnnotationDriver(new AnnotationReader(), [__DIR__ . '/src/Entity']);
        $config->setMetadataDriverImpl($annotationDriver);

        $config->setProxyDir(__DIR__ . '/../../../data/doctrine-proxies');
        $config->setProxyNamespace('Doctrine\ORM\Proxy');

        return $config;
    }
}
