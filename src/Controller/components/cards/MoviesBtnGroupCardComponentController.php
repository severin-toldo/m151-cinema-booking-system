<?php


namespace App\Controller\components\cards;


use App\Model\CardButton;
use App\Model\Permission;

class MoviesBtnGroupCardComponentController extends AbstractButtonGroupCardComponentController {

    protected function getCardTitle(): string {
        return 'Movies';
    }

    protected function getCardText(): string {
        return 'Here you can administrate movies and shows.';
    }

    protected function getButtons(): array {
        return [
            new CardButton('Add Movie', 'primary', 'add_movie', [Permission::ADD_MOVIES]),
            new CardButton('Add Show', 'primary', 'add_presentation', [Permission::ADD_SHOWS]),
            new CardButton('Movie List', 'secondary', 'movies', [])
        ];
    }
}