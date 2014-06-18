ClassifiedAdsBundle
=================================

The ClassifiedAdsBundle provide a sample classified ad system for your application based on symfony2

## Installation
### Step 1: Download ClassifiedAdsBundle using composer

``` bash
$ php composer.phar require "lsroudi/classifiedads": "dev-master"
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Lsroudi\ClassifiedAdsBundle\LsroudiClassifiedAdsBundle(),
    );
}
```

### Step 3: Create your Own Ad class

``` php

<?php

/**
 * Description of Ad
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lsroudi\ClassifiedAdsBundle\Entity\CategoryInterface;
use Lsroudi\ClassifiedAdsBundle\Entity\Ad as BaseAd;


/**
 * @ORM\Entity
 * @ORM\Table(name="lsroudi_classified_ad")
 */
class Ad extends  BaseAd
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
     * @var Lsroudi\ClassifiedAdsBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Lsroudi\ClassifiedAdsBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    protected $category;
    
    public function __construct()
    {
        parent::__construct();       
    }
       
    public function getId()
    {
        return $this->id;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    
    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;
        
        return $this;
    }   
}
```
