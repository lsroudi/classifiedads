<?php

/**
 * Description of Ad
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class Ad  implements AdInterface 
{

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=false)
     */
    protected $createdAt;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255 , nullable=false)
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    protected $description;
    

    
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }         
}