<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/', name: 'app_login')] //Définition de la route et du nom de la route 
    public function login(AuthenticationUtils $authenticationUtils): Response // On crée la fonction login qui prend en paramètre
    {                                                                         // un objet de la classe AuthenticationOutils qui fournit des outils
                                                                              // pour gerer la connexion          
        if ($this->getUser()) {
             return $this->redirectToRoute('app_mesure');
        }

        // On recupère le log de la dernière erreure 
        $error = $authenticationUtils->getLastAuthenticationError();
        // On récupere le dernier nom d'utilisateur entré par l'utlisateur
        $lastUsername = $authenticationUtils->getLastUsername();
        //On génère la vue a partir du fichier login.html.twig stocké dans ../security on lui passe les variables contenant les logs et le dernier nom d'utlilisateur
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/deconnexion', name: 'app_logout')] //Cette fonction sert à ce déconecté 
    public function logout(): void 
    {
        // Cette fonction reste vide car elle est intercépté par le firwall définie dans le fichier de config sécurity.yaml
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
