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

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Security\Core\SecurityContext;


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
     * @Route("/add", name="ad_add")
     */
    public function addAction()
    {
   
       return $this->templating->renderResponse('LsroudiClassifiedAdsBundle:Ad:add.html.twig', array(
            
        ));
    }
}