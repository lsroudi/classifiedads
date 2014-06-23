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
     * This event allows you to access the response which will be sent and modify it depend on your need.
     * The event listener method receives a Lsroudi\ClassifiedAdsBundle\Event\FilterClassifiedAdsResponseEvent instance.
     */
    const AD_ADD_COMPLETED = 'lsroudi.ad.completed';    
    
    /**
     * The AD_LIST_INIT event occurs after query to generate ad list.
     *
     * This event allows you to custimize query.
     * The event listener method receives a Lsroudi\ClassifiedAdsBundle\Event\FilterQueryForAdEvent instance.
     */
    const AD_LIST_INIT = 'lsroudi.ad.list.init';  
    
    /**
     * The AD_LIST_GENERATED event occurs after list generated.
     *
     * This event allows you to access the response which will be sent and modify it depend on your need.
     * The event listener method receives a Lsroudi\ClassifiedAdsBundle\Event\FilterQueryForAdEvent instance.
     */
    const AD_LIST_GENERATED = 'lsroudi.ad.list.generated';      
}