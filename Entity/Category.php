<?php

/**
 * Description of Annonce
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 * @ORM\Entity()
 * @ORM\Table(name="lsroudi_classified_category")
 */
class Category implements CategoryInterface {
    
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
     * @Assert\NotBlank(message = "lsroudi_classified_ads.category.name.not_blank",groups={"Default"})
     * @ORM\Column(name="name", type="string", length=255 , nullable=false)
     */
    protected $name;
    
    public function getId()
    {
        return $this->id;
    }    

    public function getName()
    {
        
    }

    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }   
     
}