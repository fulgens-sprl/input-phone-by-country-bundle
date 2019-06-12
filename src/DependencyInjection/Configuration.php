<?php


namespace Fulgens\InputPhoneByCountryBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder("fulgens_input_phone_by_country");
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode("country_provider")
                    ->defaultNull()
                    ->info("The class that provides the countries. Must implement CountryProviderInterface")
                    ->end()
            ->end();

        return $treeBuilder;
    }
}
