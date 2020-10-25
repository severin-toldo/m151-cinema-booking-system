<?php


namespace App\Controller\components\cards;


use App\Model\Permission;

class EmployeeReservationsBtnGroupComponent extends AbstractReservationsBtnGroupCardComponentController {

    protected function getCardText(): string {
        return 'Here you can manage all reservations';
    }

    protected function getReservationsRoute(): string {
        return 'all_reservations';
    }

    protected function getReservationsPermissions(): array {
        return [Permission::VIEW_ALL_RESERVATIONS];
    }
}