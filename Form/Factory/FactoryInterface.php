<?php

/**
 * Description of FactoryInterface
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Form\Factory;

interface FactoryInterface 
{

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createForm();
}
