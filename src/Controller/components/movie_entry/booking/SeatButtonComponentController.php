<?php


namespace App\Controller\components\movie_entry\booking;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class SeatButtonComponentController extends AbstractController {

    public function onInit(string $nameId, bool $reserved): Response {
        return $this->render('components/movie_entry/booking/seat_button.component.html.twig', [
            'nameId' => $nameId,
            'reserved' => $reserved
        ]);
    }
}