<?php

namespace App\Controller\pages;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Length;


class UserProfileController extends AbstractController {

    public function onInit(Request $request, UserInterface $loggedInUser = null, UserService $us) : Response {
        if (!$loggedInUser) {
            return $this->redirect('movies', 301);
        }

        $loggedInUser->setPlainPassword('');

        $fb = $this->createFormBuilder($loggedInUser);
        $form = $us->buildUserForm($fb, 'user_profile', ['agreeTerms']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $us->saveUserAndPassword($form->getData());
            $this->addFlash('success', 'User edited!');

            return $this->redirectToRoute('user_profile');
        }

        $this->getDoctrine()->getManager()->refresh($loggedInUser);

        return $this->render('pages/user_profile.page.twig', [
                'form' => $form->createView(),
            ]
        );
    }
}