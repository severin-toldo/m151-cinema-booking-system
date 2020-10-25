<?php


namespace App\Controller\pages;


use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginPageController extends AbstractController {

    public function login(AuthenticationUtils $authenticationUtils, UserInterface $loggedInUser = null): Response {

        if ($loggedInUser) {
            return $this->redirect('movies', 301);
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('pages/login.page.html.twig', [
            'lastUsername' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * This method can be empty.
     * it will be intercepted by the logout key on your firewall.
     */
    public function logout() {
        throw new LogicException('Not supposed to be called this way!');
    }
}