<?php

namespace App\Form;

use App\Entity\State;
use App\Entity\Team;
use App\Entity\Ticket;
use App\Entity\Tag;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu'
            ])
            ->add('note', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('id_tag', EntityType::class, [
                'label' => 'Type',
                'class' => Tag::class,
                'choice_label' => 'label',
                'multiple' => false,
                'required' => false,
            ])
            ->add('id_state', EntityType::class, [
                'label' => 'Etat',
                'class' => State::class,
                'choice_label' => 'label',
                'multiple' => false,
                'required' => false,
            ])
            ->add('id_author', EntityType::class, [
                'label' => 'Auteur',
                'class' => User::class,
                'choice_label' => 'email',
                'multiple' => false,
                'required' => false,
            ])
            ->add('id_team_assign', EntityType::class, [
                'label' => 'Team',
                'class' => Team::class,
                'choice_label' => 'label',
                'multiple' => false,
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
