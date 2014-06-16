<?php

/**
 * Description of AnnonceInterface
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Lsroudi\ClassifiedAdsBundle\Entity;

interface AdInterface 
{
    /**
     * Sets the title
     * @param string $title
     * 
     * @return self
     */
    public function setTitle($title);
    
    /**
     * Gets email. 
     * 
     * @return string
     */
    public function getTitle();   
    
    /**
     * Sets the description
     * @param string $description
     * 
     * @return self
     */
    public function setDescription($description);   
    
    /**
     * Gets description. 
     * 
     * @return string
     */    
    public function getDescription();

    
}
