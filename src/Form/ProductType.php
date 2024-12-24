<?php

namespace App\Form;

use App\Form\ShoppBuyerType;
use App\Form\ProductCategoryType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('productname', TextType::class, ['attr' => ['class' => 'form-control']])
        ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control']])
        ->add('price', TextType::class, ['attr' => ['class' => 'form-control']])
        ->add('quantity', TextType::class, ['attr' => ['class' => 'form-control']])
        ->add('picture', TextType::class, ['attr' => ['class' => 'form-control']])
        ->add('categorie', CollectionType::class, ['attr' => ['class' => 'form-control'],
        'entry_type' => ProductCategoryType::class,'entry_options' => ['label' => false],])
        ->add('shoppbuyer', CollectionType::class, ['attr' => ['class' => 'form-control'],
        'entry_type' => ShoppBuyerType::class,'entry_options' => ['label' => false],])
        ->add('measure', TextType::class, ['attr' => ['class' => 'form-control', 'multiple' => 'multiple']])
        ->add('Soumettre', SubmitType::class, ['label' => 'Ajouter un nouveau produit', 'attr' => ['class' => 'btn btn-primary']])
        ->getForm();
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
