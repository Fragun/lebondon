<?php

namespace App\Form;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('pseudoUtilisateur', TextType::class, ['attr' => ['class' => 'form-control mb-1'], 'label'=> false])
        ->add('nomUtilisateur', TextType::class, ['attr' => ['class' => 'form-control mb-1'], 'label'=> false])
        ->add('prenomUtilisateur', TextType::class, ['attr' => ['class' => 'form-control mb-1'], 'label'=> false])
        //->add('dateNaissance', DateTimeType::class, ['placeholder' => ['year' => 'aaaa', 'month' => 'mm', 'day' => 'jj'], 'label'=> false]) je n'arrive pas à faire fonctionner ce champ donc je ne l'ai pas intégré dans le formulaire
        ->add('genre', ChoiceType::class, ['choices' => ['Féminin' => 1,'Masculin' => 2 ], 'label'=> false])
        ->add('mailUtilisateur', EmailType::class, ['attr' => ['class' => 'form-control mb-1'], 'label'=> false])
        ->add('mdpUtilisateur', PasswordType::class, ['attr' => ['class' => 'form-control mb-1'], 'label'=> false])
        ->add('roleUtilisateur', HiddenType::class)
        ->add('resetToken', HiddenType::class)
        ->add('save', SubmitType::class, ['label'=>'s\'inscrire','attr' => ['class' => "btn btn-md full-width bg-sky text-light rounded ft-medium mt-4"]])
    ;
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Utilisateur::class,
    ]);
}
}