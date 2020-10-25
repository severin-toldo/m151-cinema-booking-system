<?php


namespace App\Controller;


use App\Entity\MovieEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends AbstractController {

    public function onInit(): Response {
        $movieRepository = $this->getDoctrine()->getRepository(MovieEntity::class);
        $movies = $movieRepository->findAll();

        return $this->render('movies.html.twig', ['movies' => $movies]);
    }
}