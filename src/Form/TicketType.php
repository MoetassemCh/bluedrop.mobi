<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('contenu', EntityType::class, [
                'required' => false,
                'class' => Ticket::class,
                'attr' => [
                    'class' => 'ring-2 ring-[#2B292D] w-full font-bold rounded-3xl px-4 py-2 outline-none placeholder-gray-500',
                    'placeholder' => 'Choix du contenu',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'p-1 my-10 ring-2 ring-[#2B292D] w-full rounded-3xl outline-none placeholder-gray-500',
                    'rows' => 6,
                    'placeholder' => 'Description...',

                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
