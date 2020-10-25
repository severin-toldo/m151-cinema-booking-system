<?php


namespace App\Controller\components\cards;


class UserProfileReservationsBtnGroupComponent extends AbstractReservationsBtnGroupCardComponentController {

    protected function getCardText(): string {
        return 'Here you can view your reservations';
    }

    protected function getReservationsRoute(): string {
        return 'user_reservations';
    }

    protected function getReservationsPermissions(): array {
        return [];
    }
}