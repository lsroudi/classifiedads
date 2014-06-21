<?php

/**
 * Description of AdController
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Controller;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Security\Core\SecurityContext;
use Lsroudi\ClassifiedAdsBundle\LsroudiClassifiedAdsEvents;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Lsroudi\ClassifiedAdsBundle\Event\FilterAdResponseEvent;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;


/**
 * @Route(service="lsroudi_classified_ads.ad.controller.service")
 */

class AdController
{
    
    /**
     *
     * @var EngineInterface
     */
    protected $templating;
    
    /**
     *
     * @var Container
     */
    protected $container;
    
    
    /**
     *
     * @var SecurityContext 
     */
    protected $context;
    
    
    public function __construct(Container $container, EngineInterface $templating, SecurityContext $context)
    {
        $this->templating = $templating;
        $this->container = $container;
        $this->context = $context;
    }
    
    /**
     * @Route("/add", name="lsroudi_classified_ads.ad_add")
     */
    public function addAction()
    {
        /** @var Request */
        $request = $this->container->get('request');
        /** @var $formFactory \Lsroudi\ClassifiedAdsBundle\Form\Factory\FormFactory */
        $formFactory = $this->container->get('lsroudi_classified_ads_bundle.ad.create.form.factory');
        /** @var $adManager \Lsroudi\ClassifiedAdsBundle\Manager\AdManager */
        $adManager = $this->container->get('lsroudi_classified_ads.ad.manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');            
        
        $ad = $adManager->createAd();
         
        $form = $formFactory->createForm();
        $form->setData($ad);
        
        if ('POST' === $request->getMethod()) {
            
            $form->bind($request);
               
            if ($form->isValid()) {                 
                
                $adManager->updateAd($ad); 
                
                $completedEvent = $dispatcher->dispatch(LsroudiClassifiedAdsEvents::AD_ADD_COMPLETED, new FilterAdResponseEvent($ad, $request));

                if (null !== $response = $completedEvent->getResponse()) {
                     $response = $completedEvent->getResponse();
                 }
                 
                return $response;                  
            }
        } 
        
       return $this->templating->renderResponse('LsroudiClassifiedAdsBundle:Ad:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
}