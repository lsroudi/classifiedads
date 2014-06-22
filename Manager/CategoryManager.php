<?php

/**
 * Description of AnnonceManager
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Lsroudi\ClassifiedAdsBundle\Entity\CategoryInterface;

class CategoryManager extends BaseManager 
{

    
    protected $objectManager;
    
    protected $class;
    
    protected $repository;

    public function __construct($class, ObjectManager $om) 
    {
        
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);
        
        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    public function loadOne($id) 
    {
        return $this->repository
                        ->findOneBy(array('id' => $id));
    }

    public function getCategoryByQuery($Query) 
    {
        
        $qb = $this->objectManager->createQueryBuilder();
        $qb->select('c')
                ->from('LsroudiClassifiedAdsBundle:Category', 'c')
                ->where('c.name LIKE :q')
                ->addOrderBy('c.name')
                ->setParameter('q', "%$Query%");

        $qr = $qb->getQuery();
        $result = $qr->getResult();
        
        return $result;
    }    

    public function save(CategoryInterface $category) 
    {
        $this->persistAndFlush($category);
        return $category;
    }


    public function getInstance()
    {
        $class = $this->getClass();
        $category = new $class;

        return $category;
    }

}
