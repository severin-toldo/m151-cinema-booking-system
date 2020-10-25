<?php


namespace App\Controller\components\movie_entry\booking;


use App\Entity\PresentationEntity;
use App\Entity\ReservationEntity;
use App\Utils\CommonUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MovieBookingComponentController extends AbstractController {

    public function onInit(PresentationEntity $presentation): Response {
        $reservations = $this
            ->getDoctrine()
            ->getRepository(ReservationEntity::class)
            ->findValidReservationsByPresentation($presentation);

        $reservedSeatIds = CommonUtils::mapToId(CommonUtils::getReservedSeatsByReservations($reservations));
        $seatrows = $presentation->getHall()->getSeatrows();

        foreach (CommonUtils::getSeatsBySeatrows($seatrows) as $seat) {
            if (in_array($seat->getId(), $reservedSeatIds)) {
                $seat->setReserved(true);
            }
        }

        return $this->render('components/movie_entry/booking/movie_booking.component.html.twig', [
            'seatrows' => $seatrows,
            'presentation' => $presentation
        ]);
    }
}

