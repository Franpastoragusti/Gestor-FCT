<?php

namespace FCTBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EmpresasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, array('label'=>'Empresa'))
            ->add('direccion', TextType::class, array('label'=>'Dirección'))
            ->add('cp', IntegerType::class, array('attr' => array('max' => 99999)))
            ->add('telefono1', IntegerType::class)
            ->add('telefono2', IntegerType::class)
            ->add('fechaCreacion',DateType::class, array('format' => 'yyyy-MM-dd','years' => range(1920, date('Y'))))
            ->add('Borrar', ResetType::class)
            ->add('Guardar', SubmitType::class)

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FCTBundle\Entity\Empresas'
        ));
    }
}
