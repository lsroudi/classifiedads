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

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

class FilterQueryForAdEvent extends Event
{
    private $qb;
    
    /**
     *
     * @var Request
     */
    private $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getQuery()
    {
        return $this->qb;
    }

    public function setQuery($qb)
    {
        $this->qb = $qb;
    }
  
    public function getRequest()
    {
        return $this->request;
    }
}

