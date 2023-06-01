<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();  //Définie un objet user appelé plus haut
        $form = $this->createForm(RegistrationFormType::class, $user); //Crée un formulaire à partir du template de formulaire définie dans l'objet RegistrationFormTypee
        $form->handleRequest($request); //On écoute si le formulaire à été renvoyé 

        if ($form->isSubmitted() && $form->isValid()) { //évalent du isset en Symfony on vérifie que le fomulaire à bien été poster et renseigné 
            // On encode le mot de passe avant de le stocker en base de donnée
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user); //On prépare une entité user à crée en base de donnée 
            $entityManager->flush(); //On vient renseigner les infos du fomulaire dans la bdd

            return $this->redirectToRoute('app_login'); //Quand c'est fait on est redirigé vers la page de connexion
        }

        return $this->render('registration/register.html.twig', [ //On vient traduire la vue twig  en HTML afin de l'afficher
            'registrationForm' => $form->createView(), //On vient traduire l'objet  php form qui contient notre formulaire en twig afin de l'afficher 
        ]);
    }
}
