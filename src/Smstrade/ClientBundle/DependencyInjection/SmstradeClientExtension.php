<?php

namespace Smstrade\ClientBundle\DependencyInjection;

use \Symfony\Component\Config\Definition\Processor;
use \Symfony\Component\Config\FileLocator;
use \Symfony\Component\HttpKernel\DependencyInjection\Extension;
use \Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use \Symfony\Component\DependencyInjection\ContainerBuilder;

class SmstradeClientExtension extends Extension {

    public function load(array $config, ContainerBuilder $container) {
        //Services
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('services.xml');

        //Config
        $processor = new Processor();
        $configuration = new Configuration($container->getParameter('kernel.debug'));
        $config = $processor->processConfiguration($configuration, $config);
        
        $container->setParameter('smstrade_client.key', $config["key"]);
    }

    public function getAlias()
    {
        return 'smstrade_client';
    }
}
