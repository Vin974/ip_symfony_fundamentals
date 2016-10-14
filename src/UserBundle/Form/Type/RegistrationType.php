<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 14/10/2016
 * Time: 12:24
 */

namespace UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class RegistrationType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullname', TextType::class)
        ;
    }


    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'registration';
    }

    /**
     * @inheritDoc
     */
    public function getParent()
    {
        return 'fos_user_registration';
    }


}