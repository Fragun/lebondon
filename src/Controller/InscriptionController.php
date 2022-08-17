<?php

namespace App\Controller;

use DateTime;
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $Utilisateur = new Utilisateur();
        $form_utilisateur = $this->createForm(UtilisateurType::class, $Utilisateur);

        $form_utilisateur ->handleRequest($request);

        if($form_utilisateur->isSubmitted() && $form_utilisateur->isValid()){

            $data = $form_utilisateur->getData(); //pour choper les infos du formulaire
            //dd($data);
            $mdpEnClair = $data->getMdp(); // pour choper le mdp
            $mdpHashe = $passwordHasher->hashPassword($Utilisateur, $mdpEnClair); //pour hasher le mdp en clair
            $Utilisateur->setMdp($mdpHashe); //pour fixer le mdp hasché

            $Utilisateur->setIpInscription($_SERVER['REMOTE_ADDR']); // assigne son ip dans ip inscription dans la bdd
            $Utilisateur->setRoleUtilisateur('ROLE_USER'); // assigne a la creation le role user dans la bdd
            $Utilisateur->setDateInscription(new DateTime()); // assigne la date du jour a la creation dans la bdd

            $manager->persist($Utilisateur); // si donnée persiste
            $manager->flush();  //envoi bbd

            $this->addFlash(
                'message1',
                "<script> Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'votre compte a bien été créé',
                        showConfirmButton: false,
                        timer: 1500

                    })</script>"
            );
                
            return $this->redirectToRoute('app_connexion');
        }
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
            'form_utilisateur' => $form_utilisateur ->createView()
        ]);
    }
}
}