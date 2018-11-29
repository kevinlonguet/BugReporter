<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\State;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextType::class, [
                'label' => "Contenu"
            ])
            ->add('id_author', EntityType::class, [
                'label' => 'Etat',
                'class' => State::class,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('id_ticket');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
