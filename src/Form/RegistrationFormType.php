<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',TextType::class,[
                
                'label'=>false,
                'required' => false,
                'attr'=>[
                'autocomplete' => 'email',
                'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
                'placeholder' => 'votre adresse e-mail*',
                
                ],
                'constraints'=>[
                new NotBlank([
                       
                    'message' => 'Please enter your email',
                
                ]),
               
                ]
            ])
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type'=>PasswordType::class,
                'mapped' => false,
                'required'=>false,
                'options'=>['attr' => [
                'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
                    'autocomplete' => 'new-password',
               
            ]],
                'first_options'  => ['label' => false],
                'second_options' => ['label' => false],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('fullname', TextType::class, [

                'label' => false,
            'required' => false,
                'attr' => [
                    'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
                    'placeholder' => 'votre nom*',

                ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter your Full Name',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Your FullName should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
                new Regex([
                   'pattern'=>'/^\S*$/',
                   'message'=> 'Your name cannot have space' 
                ])
            ],
            ])

            ->add('username', TextType::class, [

                'label' => false,
            'required' => false,
                'attr' => [
                    'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
                    'placeholder' => 'username*',

                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your username',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your username should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])



            ->add('region', TextType::class, [

                'label' => false,
            'required' => false,
                'attr' => [
                    'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
                    'placeholder' => 'région',

                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your region',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your region should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])


            // ->add('image', FileType::class, [

            //     'label' => false,
            //     'mapped'=>false,
            //     'attr' => [
            //         'class' => 'block border border-[#2B292D] placeholder-[#605F61] w-full h-full p-3 rounded-3xl mb-4',
            //     ],

            //     ])






        ->add('phonenumber', IntegerType::class, [

            'label' => false,
            'required' => false,
            'attr' => [
                'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
                'placeholder' => 'votre numero de telephone*',

            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter your phonenumber',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Your phonenumber should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 15,
                ]),
            ],
        ])

        ->add('DOB', BirthdayType::class, [

            'label' => false,
            'required' => false,
            'placeholder' => array(
                'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
            ),
            'attr' => [
                'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
               
            ],
            'years' => range((int) date('Y') - 120, date('Y')),
            'invalid_message' => 'Please enter a valid birthdate.',
        ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
