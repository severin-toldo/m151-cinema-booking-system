<?php


namespace App\Controller\pages\lists;



use App\Entity\ReservationEntity;
use App\Model\Permission;

class AllReservationsListPageController extends AbstractListPageController {

    protected function getViewPermissions(): array {
        return [Permission::VIEW_ALL_RESERVATIONS];
    }

    protected function getListData(): array {
        return $this
            ->getDoctrine()
            ->getRepository(ReservationEntity::class)
            ->findAll();
    }

    protected function getTitle(): string {
        return 'All Reservations';
    }
}