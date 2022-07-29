<?php

namespace App\Form;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('pseudo', TextType::class, ['attr' => ['class' => 'form-control'], 'label'=> false])
        ->add('email', EmailType::class, ['attr' => ['class' => 'form-control'], 'label'=> false])
        ->add('mdp', PasswordType::class, ['attr' => ['class' => 'form-control'], 'label'=> false])
        ->add('dateInscrip', HiddenType::class)
        ->add('ipInscript', HiddenType::class)
        ->add('roleUtilisateur', HiddenType::class)
        ->add('save', SubmitType::class, ['label'=>'valider','attr' => ['class' => 'btn btn-success mt-5']])
    ;
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Utilisateur::class,
    ]);
}
}