<?php


namespace App\Controller\pages;


use App\Entity\MovieEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MoviePageController extends AbstractController {

    public function onInit(int $movieId, Request $request): Response {
        $movie = $this->getDoctrine()->getRepository(MovieEntity::class)->find($movieId);

        return $this->render('pages/movie.page.html.twig', [
            'movie' => $movie
        ]);
    }
}