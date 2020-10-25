<?php


namespace App\Controller\pages\lists;


use App\Model\Permission;

class UserListPageController extends AbstractUserListPageController {

    protected function getViewPermissions(): array {
        return [Permission::VIEW_ALL_USERS];
    }

    protected function getListData(): array {
        return $this->us->getCustomers();
    }

    protected function getTitle(): string {
        return 'Users';
    }

    protected function onClickRoute(): string {
        return 'edit_user';
    }
}