<?php

/**
 * Description of FilterAdResponseEvent
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Lsroudi\ClassifiedAdsBundle\Entity\AdInterface;

class FilterAdResponseEvent extends AdEvent
{
    
    protected $response;

    public function __construct(AdInterface $ad, Request $request, Response $response = null)
    {
        parent::__construct($ad, $request);
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    public function setResponse($response)
    {
        $this->response = $response;
    }
}