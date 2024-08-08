<?php
namespace App\Form;

use App\Entity\Post;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AnimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title',
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Summary',
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Content',
            ])
            ->add('create_at', DateTimeType::class, [
                'label' => 'Creation Date',
                'widget' => 'single_text',
                'input' => 'datetime_immutable',  // Ensure the form handles DateTimeImmutable correctly
            ])
            ->add('image', TextType::class,  [
                'label' => 'Image',
            ])
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email', // Or any other field you want to use to represent the user
                'label' => 'Author',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
