<?php


namespace App\Controller\pages\lists;



use App\Entity\ReservationEntity;
use App\Model\Permission;
use App\Utils\CommonUtils;

class AllReservationsListPageController extends AbstractListPageController {

    protected function getViewPermissions(): array {
        return [Permission::VIEW_ALL_RESERVATIONS];
    }

    protected function getListData(): array {
        return $this
            ->getDoctrine()
            ->getRepository(ReservationEntity::class, CommonUtils::resolveSlave())
            ->findAll();
    }

    protected function getTitle(): string {
        return 'All Reservations';
    }
}