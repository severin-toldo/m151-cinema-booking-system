<?php


namespace App\Controller\components;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class RootRedirectComponentController extends AbstractController {

    public function onInit(): Response {
        return $this->redirect('movies', 301);
    }
}