<?php


namespace App\Controller\components\cards;


use App\Model\CardButton;
use App\Model\Permission;

class EmployeesBtnGroupCardComponentController extends AbstractButtonGroupCardComponentController {

    protected function getCardTitle(): string {
       return 'Employees';
    }

    protected function getCardText(): string {
        return 'Here you can administrate the employees.';
    }

    protected function getButtons(): array {
        return [
            new CardButton('Employees', 'primary', 'employee_list', [Permission::VIEW_ALL_EMPLOYEES]),
            new CardButton('Add Employee', 'primary', 'edit_employee', [Permission::ADD_EMPLOYEES, Permission::EDIT_EMPLOYEES]),
        ];
    }
}