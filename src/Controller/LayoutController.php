<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends AbstractController {

    public function onInit(): Response {
        return $this->render('layout.html.twig', []);
    }
}