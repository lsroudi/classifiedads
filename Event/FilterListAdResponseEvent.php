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

class FilterListAdResponseEvent extends Event
{
    private $response;
    
    private $entities;
    
    private $pagerfanta;

    public function __construct($entities, $pagerfanta)
    {
        $this->entities = $entities;
        $this->pagerfanta = $pagerfanta;
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
    
    public function getEntities()
    {
        return $this->entities;
    }
    public function getPagerfanta()
    {
        return $this->pagerfanta;
    } 
}
?>

