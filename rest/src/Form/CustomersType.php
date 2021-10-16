<?php

namespace App\Form;

use App\Entity\Customers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class CustomersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customername', TextType::class, [
                'label'=> 'Customer name',
                'atrr' => [
                    'placeholder' => 'Miriam',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ]
            ])
            ->add('contactlastname')
            ->add('contactfirstname')
            ->add('phone')
            ->add('addressline1')
            ->add('addressline2')
            ->add('city')
            ->add('state')
            ->add('postalcode')
            ->add('country')
            ->add('creditlimit')
            ->add('salesrepemployeenumber', NumberType::class ,[
                'label'=> 'Sales rep emp employee',
                'atrr' => [
                    'placeholder' => '102',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => false
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customers::class,
        ]);
    }
}
