<?php

namespace App\Form\Type;

use App\Entity\Comment;
use App\Entity\Poem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => 'Your comment'
            ])
            ->add('poem', HiddenType::class)
            ->add('send', SubmitType::class, [
                'label' => 'Send comment'
            ]);

        $builder->get('poem')
            ->addModelTransformer(new CallbackTransformer(
                fn(Poem $poem) => $poem->getId(),
                fn(Poem $poem) => $poem->getTitle()
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class
        ]);
    }
}