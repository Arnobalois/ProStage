<?php

namespace App\Form;

use App\Entity\Stage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Form\EntrepriseType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Duree')
            ->add('Description')
            ->add('CompetencesRequises')
            ->add('ExperienceRequise')
            ->add('Email')
            ->add('Contact')
            ->add('Entreprise',EntrepriseType::class)
            ->add('Formation', EntityType::class, [
    // looks for choices from this entity
    'class' => Formation::class,

    // uses the User.username property as the visible option string
    'choice_label' => 'Nom',

    // used to render a select box, check boxes or radios
     'multiple' => true,
    'expanded' => true,
])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
