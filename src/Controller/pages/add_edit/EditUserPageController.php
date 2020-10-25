<?php


namespace App\Controller\pages\add_edit;


use App\Entity\UserEntity;
use App\Model\Permission;

class EditUserPageController extends AbstractEditUserPageController {

    protected function getAddPageTitle(): string {
        return 'Add User';
    }

    protected function getAddPermissions(): array {
        return [Permission::ADD_USERS];
    }

    protected function getEditPageTitle(): string {
        return 'Edit User';
    }

    protected function getEditPermissions(): array {
        return [Permission::EDIT_USERS];
    }

    protected function getFormActionRoute(): string {
        return 'edit_user';
    }

    protected function getData() {
        return $this->us->getCustomerById($this->dataId);
    }

    protected function handleForm(): void {
        $this->saveUser();
    }
}