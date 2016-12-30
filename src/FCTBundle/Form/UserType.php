<?php

namespace FCTBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FCTBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
     public function buildForm(FormBuilderInterface $builder, array $options)
       {
           $builder
               ->add('email', EmailType::class)
               ->add('username', TextType::class)
               ->add('plainPassword', RepeatedType::class, array(
                   'type' => PasswordType::class,
                   'first_options'  => array('label' => 'Contraseña'),
                   'second_options' => array('label' => 'Repite contraseña'),
               ))
               ->add('Borrar', ResetType::class)
               ->add('Guardar', SubmitType::class)
           ;
       }

       public function configureOptions(OptionsResolver $resolver)
       {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
      }
}
