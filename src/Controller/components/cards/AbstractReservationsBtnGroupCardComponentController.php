<?php


namespace App\Controller\components\cards;


use App\Model\CardButton;

abstract class AbstractReservationsBtnGroupCardComponentController extends AbstractButtonGroupCardComponentController {

    protected function getCardTitle(): string {
        return 'Reservations';
    }

    protected function getButtons(): array {
        return [
            new CardButton('Reservations', 'primary', $this->getReservationsRoute(), $this->getReservationsPermissions()),
            new CardButton('Movie List', 'secondary', 'movies', [])
        ];
    }

    protected abstract function getReservationsRoute(): string;
    protected abstract function getReservationsPermissions(): array;
}