<?php

/**
 * Description of Group
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 * @ORM\Entity()
 * @ORM\Table(name="lsroudi_classified_group")
 */
class Group 
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255 , nullable=false)
     */
    protected $name;

    /**
     *  @ORM\OneToMany(targetEntity="Lsroudi\ClassifiedAdsBundle\Entity\Category", mappedBy="group")
     */
    protected $category; 
    
    public function getId()
    {
        return $this->id;
    }    

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    } 
    
}