<?php


namespace App\Controller\components\cards;


use App\Model\CardButton;
use App\Model\Permission;

class UsersBtnGroupCardComponentController extends AbstractButtonGroupCardComponentController {

    protected function getCardTitle(): string {
        return 'Users';
    }

    protected function getCardText(): string {
        return 'Here you can administrate the users.';
    }

    protected function getButtons(): array {
        return [
            new CardButton('Users', 'primary', 'user_list', [Permission::VIEW_ALL_USERS]),
            new CardButton('Add User', 'primary', 'edit_user', [Permission::ADD_USERS, Permission::EDIT_USERS]),
        ];
    }
}