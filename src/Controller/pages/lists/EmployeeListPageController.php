<?php


namespace App\Controller\pages\lists;


use App\Model\Permission;

class EmployeeListPageController extends AbstractUserListPageController {

    protected function getViewPermissions(): array {
        return [Permission::VIEW_ALL_EMPLOYEES];
    }

    protected function getListData(): array {
        return $this->us->getEmployees();
    }

    protected function getTitle(): string {
        return 'Employees';
    }

    protected function onClickRoute(): string {
        return 'edit_employee';
    }
}