<?php

namespace Lsroudi\ClassifiedAdsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LsroudiClassifiedAdsExtension extends Extension
{
    /**
     *
     * @var type 
     */
    private $container;
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->container = $container;
        
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->container->setParameter('lsroudi_classified_ads.model.ad.name', $config['model']['ad']['name']);
        $this->container->setParameter('lsroudi_classified_ads.model.ad.type', $config['model']['ad']['type']);
        $this->container->setParameter('lsroudi_classified_ads.model.ad.validation_groups', $config['model']['ad']['validation_groups']);
        $this->container->setParameter('lsroudi_classified_ads.model.ad.class', $config['model']['ad']['class']);
        $this->container->setParameter('lsroudi_classified_ads.model.ad.form', $config['model']['ad']['form']);  
        
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('manager.xml');
        
        $this->loadFormService();
    }

    private function loadFormService()
    {
        $laoder = new Loader\XmlFileLoader($this->container, new FileLocator(__DIR__ . '/../Resources/config/form'));
        $laoder->load('ad.xml');
    }
}
