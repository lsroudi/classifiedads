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
        $this->em->persist($entity);
        $this->em->flush();
    }

    protected function delete($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
    public function getClass()
    {
        return $this->class;
    }
    
}

?>
