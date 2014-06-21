<?php

/**
 * Description of AdEvent
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Lsroudi\ClassifiedAdsBundle\Event;

use Lsroudi\ClassifiedAdsBundle\Entity\AdInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

class AdEvent extends Event
{
    /**
     *
     * @var Request
     */
    private $request;
    /**
     *
     * @var AdInterface 
     */
    private $ad;
    
    public function __construct(AdInterface $ad, Request $request)
    {
        $this->ad = $ad;
        $this->request = $request;
    }
    
    /**
     * 
     * @return AdInterface
     */
    public function getAd()
    {
        return $this->ad;
    }
    /**
     * 
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
    
}

