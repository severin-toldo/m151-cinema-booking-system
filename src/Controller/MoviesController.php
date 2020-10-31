<?php


namespace App\Controller;


use App\Entity\MovieEntity;
use App\Utils\CommonUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends AbstractController {

    public function onInit(): Response {
        $movies = $this
            ->getDoctrine()
            ->getRepository(MovieEntity::class, CommonUtils::resolveSlave())
            ->findAll();

        return $this->render('movies.html.twig', ['movies' => $movies]);
    }
}