<?php

namespace App\Controller\pages;

use App\Security\LoginFormAuthenticator;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;


class RegisterPageController extends AbstractController {

    public function register(Request $request, UserService $userFormService, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator, UserInterface $loggedInUser = null): Response {

        if ($loggedInUser) {
            return $this->redirect('movies', 301);
        }

        $fb = $this->createFormBuilder($userFormService->getEmptyUserEntity());
        $form = $userFormService->buildUserForm($fb, '/register', []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newUserEntity = $form->getData();
            $userFormService->saveUserAndPassword($newUserEntity);

            return $guardHandler->authenticateUserAndHandleSuccess(
                $newUserEntity,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('pages/register.page.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
