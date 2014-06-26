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

use Lsroudi\ClassifiedAdsBundle\Entity\AdInterface;

class ModifyAdEvent extends AdEvent
{
    
    protected $ad;

    public function __construct(AdInterface $ad)
    {
        $this->ad = $ad;
    }

    /**
     * @return AdInterface
     */
    public function getAd()
    {
        return $this->ad;
    }
}