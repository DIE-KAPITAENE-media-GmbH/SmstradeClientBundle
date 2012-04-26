<?php

namespace Smstrade\ClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    public function getConfigTreeBuilder() {

        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('smstrade_client');

        $rootNode
            ->children()
                ->scalarNode('key')->isRequired()->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
