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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Lsroudi\ClassifiedAdsBundle\LsroudiClassifiedAdsEvents;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Lsroudi\ClassifiedAdsBundle\Event\FilterAdResponseEvent;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Lsroudi\ClassifiedAdsBundle\Event\FilterQueryForAdEvent;
use Lsroudi\ClassifiedAdsBundle\Event\FilterListAdResponseEvent;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;


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

                $url = $this->container->get('router')->generate('lsroudi_classified_ads.ad_add_confirmed');
                $response = new RedirectResponse($url);
                    
                $completedEvent = $dispatcher->dispatch(LsroudiClassifiedAdsEvents::AD_ADD_COMPLETED, new FilterAdResponseEvent($ad, $request,$response));
                
                if (null !== $completedEvent->getResponse()) {
                     $response = $completedEvent->getResponse();
                 }
                 
                return $response;                  
            }
        } 
        
       return $this->templating->renderResponse('LsroudiClassifiedAdsBundle:Ad:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    
    /**
     * @Route("/list/{page}", defaults={"page" = 1},name="ad_list")
     */
    public function listAction($page)
    {
        /** @var $adManager \Lsroudi\ClassifiedAdsBundle\Manager\AdManager */
        $adManager = $this->container->get('lsroudi_classified_ads.ad.manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');          

        $qb = $adManager->findAds();
        
        /* customize query with event pattern */
        $request = $this->container->get('request');
        
        $queryevent = new FilterQueryForAdEvent($request);
        $dispatcher->dispatch(LsroudiClassifiedAdsEvents::AD_LIST_INIT, $queryevent);
        
        if (null != $queryevent->getQuery()){  
            $qb = $queryevent->getQuery();
        }        
        
        $adapter = new DoctrineORMAdapter($qb);
        $pagerfanta = new Pagerfanta($adapter);
        try {
            $entities = $pagerfanta
                    ->setMaxPerPage(5)
                    ->setCurrentPage($page)
                    ->getCurrentPageResults();
        } catch (\Pagerfanta\Exception\NotValidCurrentPageException $e) {
            throw new \Exception("Page not found.");
        }
        
        $event = new FilterListAdResponseEvent($entities, $pagerfanta);
        $dispatcher->dispatch(LsroudiClassifiedAdsEvents::AD_LIST_GENERATED, $event);

        if (null != $response = $event->getResponse()){
            
            return $response;
        }
        
        return $this->templating->renderResponse('LsroudiClassifiedAdsBundle:Ad:list.html.twig', array(
                    'entities' => $entities,
                    'pager' => $pagerfanta
        ));        
    }    
    
    /**
     * @Route("/confirmed", name="lsroudi_classified_ads.ad_add_confirmed")
     */    
    public function addConfirmedAction()
    {
        
        return $this->container->get('templating')->renderResponse('LsroudiClassifiedAdsBundle:Ad:add_confirmed.html.twig');                    
    }
   
}