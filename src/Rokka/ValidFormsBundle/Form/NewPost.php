<?php


namespace Rokka\ValidFormsBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Rokka\ValidFormsBundle\Entity\Post;

class NewPost extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption', TextType::class)
            ->add('shortText', TextareaType::class, array('label' => 'Short text'))
            ->add('text', TextareaType::class, array('label' => 'Full text'))
            ->add('tag', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create post'))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Post::class,
        ));
    }
}
