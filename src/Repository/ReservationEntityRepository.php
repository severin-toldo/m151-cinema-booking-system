<?php
namespace App\Repository;

use App\Entity\PresentationEntity;
use App\Entity\ReservationEntity;
use App\Entity\SeatEntity;
use App\Entity\UserEntity;
use Doctrine\ORM\EntityRepository;
use Exception;

class ReservationEntityRepository extends EntityRepository {

    public function findValidReservationsByPresentation(PresentationEntity $presentation) {
        return $this->findBy(
            array('presentation' => $presentation, 'valid' => true),
        );
    }

    public function addReservation(PresentationEntity $presentation, UserEntity $user, int $seatId): bool {
        try {
            $reservation = new ReservationEntity();
            $reservation->setCode(uniqid());
            $reservation->setPresentation($presentation);
            $reservation->setSeat($this->getEntityManager()->getRepository(SeatEntity::class)->find($seatId));
            $reservation->setUser($user);

            $this->getEntityManager()->persist($reservation);
            $this->getEntityManager()->flush();

            // TODO if time email

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}