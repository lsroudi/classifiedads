<?php

namespace Lsroudi\ClassifiedAdsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lsroudi_classified_ads');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $this->addModelsection($rootNode);

        return $treeBuilder;
    }
    
    private function addModelsection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('model')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('ad')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('class')->defaultValue('Lsroudi\ClassifiedAdsBundle\Entity\Ad')->end()
                                ->scalarNode('form')->defaultValue('Lsroudi\ClassifiedAdsBundle\Form\Type\AdType')->end()
                                ->scalarNode('type')->defaultValue('lsroudi_classified_ads_ad')->end()
                                ->scalarNode('name')->defaultValue('lsroudi_classified_ads_ad_form')->end()
                                ->arrayNode('validation_groups')
                                    ->prototype('scalar')->end()
                                    ->defaultValue(array('Default'))
                                ->end()
                            ->end()
                        ->end() 
                        ->arrayNode('category')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('class')->defaultValue('Lsroudi\ClassifiedAdsBundle\Entity\Ad')->end()
                            ->end()
                        ->end()                 
                    ->end()
                ->end()
            ->end();
    }
}
