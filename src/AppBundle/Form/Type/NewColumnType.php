<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 24/10/2016
 * Time: 00:33
 */

namespace AppBundle\Form\Type;


use AppBundle\Form\DataTransformer\BoardTransformer;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class NewColumnType
 * @package AppBundle\Form\Type
 * @author Vincent DIJOUX <dijoux.vin@gmail.com>
 */
class NewColumnType extends AbstractType
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @inheritDoc
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('board', HiddenType::class)
            ->add('save', SubmitType::class, [
                'label' => 'Add a column',
            ])
        ;

        $builder->get('board')->addModelTransformer(new BoardTransformer($this->em));
    }

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getParent()
    {
        return ColumnType::class;
    }

}