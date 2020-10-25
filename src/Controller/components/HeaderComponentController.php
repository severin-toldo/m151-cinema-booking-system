<?php


namespace App\Controller\components;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HeaderComponentController extends AbstractController {

    public function onInit(): Response {
        return $this->render('components/header.component.html.twig', [
            'link1' => 'Home',
            'link2' => 'Users',
            'link3' => 'Movies',
        ]);
    }
}