<?php


namespace App\Controller\pages\add_edit;


use App\Entity\UserEntity;
use App\Model\Permission;
use App\Model\Role;

class EditEmployeePageController extends AbstractEditUserPageController {

    protected function getAddPageTitle(): string {
        return 'Add Employee';
    }

    protected function getAddPermissions(): array {
        return [Permission::ADD_EMPLOYEES];
    }

    protected function getEditPageTitle(): string {
        return 'Edit Employee';
    }

    protected function getEditPermissions(): array {
        return [Permission::EDIT_EMPLOYEES];
    }

    protected function getFormActionRoute(): string {
        return 'edit_employee';
    }

    protected function getData() {
        return $this->us->getEmployeeById($this->dataId);
    }

    protected function handleForm(): void {
        $this->saveUser([Role::EMPLOYEE]);
    }
}