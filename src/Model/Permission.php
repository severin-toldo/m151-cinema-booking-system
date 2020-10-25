<?php


namespace App\Model;


use MyCLabs\Enum\Enum;

class Permission extends Enum {
    const VIEW_ADMIN_PAGE = 'view_admin_page';
    const VIEW_EMPLOYEE_PAGE = 'view_employee_page';
    const VIEW_ALL_RESERVATIONS = 'view_all_reservations';
    const EDIT_RESERVATIONS = 'edit_reservations';
    const ADD_MOVIES = 'add_movies';
    const ADD_SHOWS = 'add_shows';
    const VIEW_ALL_EMPLOYEES = 'view_all_employees';
    const ADD_EMPLOYEES = 'add_employees';
    const EDIT_EMPLOYEES = 'edit_employees';
    const VIEW_ALL_USERS = 'view_all_users';
    const ADD_USERS = 'add_users';
    const EDIT_USERS = 'edit_users';
}



