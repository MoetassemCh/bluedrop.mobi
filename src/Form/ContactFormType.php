<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, [
                'label' => false,
                'attr' => [
                'class' => 'ring-2 ring-[#2B292D] w-full rounded-3xl px-4 py-2 outline-none placeholder-gray-500',
                'placeholder' => 'votre nom',
            ],
            ])
            ->add('email', EmailType::class, [
            'label' => false,
            'attr' => [
                'class' => 'ring-2 ring-[#2B292D] w-full rounded-3xl px-4 py-2 outline-none placeholder-gray-500',
                'placeholder' => 'votre adresse e-mail*',

            ],
            ])
            ->add('message', TextareaType::class, [
            'label' => false,
            'attr' => [
                'class' => 'p-1 ring-2 ring-[#2B292D] w-full rounded-3xl outline-none placeholder-gray-500',
                'rows'=>6,
                'placeholder' => 'votre message*',

            ],
            ])


            ->add('phonenumber', TextType::class, [

                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'ring-2 ring-[#2B292D] w-full rounded-3xl px-4 py-2 outline-none placeholder-gray-500',
                    'placeholder' => 'votre numero de telephone*',
                ],
       
            ])
            ->add('selectpack',ChoiceType::class,[
                'label'=>false,
                'choices'=>[
                'Starter'=> 'Starter',
                'Pro'=>'Pro',
                'Premium'=>'Premium'
                ],
            'attr' => [
                'class' => 'ring-2 ring-[#2B292D] w-full font-bold rounded-3xl px-4 py-2 outline-none placeholder-gray-500 ',
                'placeholder' => 'Choix du pack',
            ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
