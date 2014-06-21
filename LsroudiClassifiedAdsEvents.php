<?php

/**
 * Description of LsroudiClassifiedAdsEvents
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle;

class LsroudiClassifiedAdsEvents 
{

    /**
     * The AD_ADD_COMPLETED event occurs after saving the ad in the add process.
     *
     * This event allows you to access the response which will be sent.
     * The event listener method receives a Lsroudi\ClassifiedAdsBundle\Event\FilterClassifiedAdsResponseEvent instance.
     */
    const AD_ADD_COMPLETED = 'lsroudi.ad.completed';    
}