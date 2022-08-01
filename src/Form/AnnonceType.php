<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\Annonce;
use App\Entity\Categorie;
use App\Entity\EtatObjet;
use App\Entity\SousCategorie;
use App\Repository\AnnonceRepository;
use Symfony\Component\Form\AbstractType;
use App\Repository\SousCategorieRepository;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            //->add('adresse')
            ->add('dateCreationAnnonce', HiddenType::class)
            ->add('idCategorie', EntityType::class, [
                // looks for choices from this entity
                'class' => Categorie::class,
                'mapped' => false,
                // uses the User.username property as the visible option string
                //'choices' => $this->userRepository->findAllOrderByAsc(),
                'choice_label' => 'nomCategorie', 
                // used to render a select box, check boxes or radios
                'multiple' => true,
                // 'expanded' => true,
                'label' => false,
                'attr'=> ['class'=> 'form-select text-center mt-1'] ] )
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

            ->add('images', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control'],
    
                ])
            //->add('idVille', EntityType::class,[
              //  'class' => Ville::class,
                //])
            ->add('idEtat', EntityType::class,[
                'class' => EtatObjet::class,
                'choice_label' => 'nomEtat', 
                'multiple' => true,
                'label' => false,
                'attr'=> ['class'=> 'form-select text-center mt-1'] 
                ])
            //->add('idUtilisateur', HiddenType::class)
            ->add('save', SubmitType::class,['attr'=> ['class'=> 'btn btn-dark mt-3'], 'label' => 'Valider le don'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
