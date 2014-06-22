<?php

/**
 * Description of BaseManager
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Manager;

abstract class BaseManager
{
    protected function persistAndFlush($entity)
    {
        $this->objectManager->persist($entity);
        $this->objectManager->flush();
    }

    protected function delete($entity)
    {
        $this->objectManager->remove($entity);
        $this->objectManager->flush();
    }
    public function getClass()
    {
        return $this->class;
    }
    
}

?>
