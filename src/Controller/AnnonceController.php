<?php

namespace App\Controller;

use DateTime;
use App\Entity\Image;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AnnonceController extends AbstractController
{
    #[Route('/ajouter-annonce', name: 'app_annonce')]
    public function ajouterAnnonce(Request $request,EntityManagerInterface $manager, TokenStorageInterface $tokenStorage): Response
    {
        //$utilisateur->getIdUtilisateur();  mettre UserInterface $utilisateur, en parametre
        $annonce = new Annonce();
        
        $form_annonce= $this->createForm (AnnonceType::class, $annonce);
        $form_annonce->handleRequest($request);
        
        if ($form_annonce->isSubmitted() && $form_annonce->isValid()) {

            $utilisateur = $tokenStorage->getToken()->getUser();

            $slugify = new Slugify();
            $slug = $slugify->slugify($annonce->getTitreAnnonce()); 
            $annonce->setSlugAnnonce($slug);
            
            $annonce->setIdUtilisateur($utilisateur);
            //dd($form_annonce);
            $annonce->setDateCreationAnnonce(new DateTime());
// On récupère les images transmises
            $images = $form_annonce->get('images')->getData();
            $manager->persist($annonce);
            // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
                
                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                
                // On crée l'image dans la base de données
                $img = new Image();
                $img->setNomImage($fichier);
                $img->setIdAnnonce($annonce);
                $manager->persist($img);
                $manager->flush();
            }
            $manager->flush();

            $this->addFlash('notice', "<script>Swal.fire({

                position: 'center',

                icon: 'success',

                title: 'Bravo, votre annonce a bien été créé !',

                showConfirmButton: false,

                timer: 1500

                })</script>");


            return $this->redirectToRoute('app_dashboard'); //redirection vers dashboard
            
            
        }



        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'form_annonce' => $form_annonce->createView()

        ]);
    }
}
