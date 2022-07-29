<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\SousCategorie;
use App\Repository\AnnonceRepository;
use Symfony\Component\Form\AbstractType;
use App\Repository\SousCategorieRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceType extends AbstractType
{
    private $userRepository;
    public function __construct(SousCategorieRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
   
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreAnnonce', TextType::class, ['attr'=> ['class'=> 'form-control text-center mt-1'], 'label' => false])
            ->add('descriptionAnnonce', CKEditorType::class, ['attr'=> ['class'=> 'form-control text-center mt-1'], 'label' => false])
            ->add('adresse')
            ->add('dateCreationAnnonce')
            ->add('idSousCategorie', EntityType::class, [
                // looks for choices from this entity
                'class' => SousCategorie::class,
            
                // uses the User.username property as the visible option string
                //'choices' => $this->userRepository->findAllOrderByAsc(),
                'choice_label' => 'nomSousCategorie', 
                // used to render a select box, check boxes or radios
                'multiple' => true,
                // 'expanded' => true,
                'label' => false,
                'attr'=> ['class'=> 'form-select text-center mt-1'] ] )
            ->add('idVille')
            //->add('idEtat')
            ->add('idUtilisateur')
            ->add('save', SubmitType::class,['attr'=> ['class'=> 'btn btn-dark mt-3'], 'label' => 'Créer l\'annonce'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
