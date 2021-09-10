<?php

namespace App\Form;

use App\Entity\Journal;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class JournalType extends AbstractType
{

        public function buildForm(FormBuilderInterface $buider, array $options)
        {
            $buider
                ->add('nom', TextareaType ::class, [
                    'label' => 'Nom du Journal',
                    'attr'  =>  [
                        'placeholder' =>'Nom du journal '
                    ]
                ])
                ->add('prix', MoneyType ::class, [
                    'currency' => 'EUR',
                    'divisor' =>100,
                    'label' => 'Prix du Journal'
                ])
                ;
                
        }

        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver ->setDefaults([
                'data_class' => Journal::class,
            ]);
        }
    }
