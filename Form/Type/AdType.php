<?php

/**
 * Description of AnnonceType
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsroudi\ClassifiedAdsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdType extends AbstractType {

    /**
     *
     * @var EntityManager
     */
    private $em;
    
    /**
     *
     * @var string class name 
     */
    private $class;

    /**
     * @param string $class The ad class name
     */
    public function __construct($class, EntityManager $em)
    {
        $this->class = $class;
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text')
                ->add('description', 'textarea')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'ad_creattion',
        ));
    }

    public function getName()
    {
        return 'ad';
    }

}