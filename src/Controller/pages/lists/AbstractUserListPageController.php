<?php


namespace App\Controller\pages\lists;


use App\Service\UserService;

abstract class AbstractUserListPageController extends AbstractListPageController {

    protected UserService $us;

    public function __construct(UserService $us) {
        $this->us = $us;
    }

    protected function isClickable(): bool {
        return true;
    }

    protected function headerDisplayText(): string {
        return 'Firstname, Lastname';
    }
}