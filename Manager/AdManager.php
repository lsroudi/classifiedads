<?php

/**
 * Description of AdManager
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\Persistence\ObjectManager;
use Lsroudi\ClassifiedAdsBundle\Entity\AdInterface;

class AdManager extends BaseManager 
{

    protected $em;
    protected $objectManager;
    protected $class;
    protected $repository;
    

    public function __construct(EntityManager $em, $class, ObjectManager $om)
    {
        $this->em = $em;

        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);

        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }        

    public function save(AdInterface $ad)
    {
        $this->persistAndFlush($ad);
    }

    public function remove(AdInterface $ad)
    {
        $this->delete($ad);
    }
    public function getInstance()
    {
        $class = $this->getClass();
        $ad = new $class;

        return $ad;
    }

}