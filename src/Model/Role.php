<?php


namespace App\Model;


use MyCLabs\Enum\Enum;

class Role extends Enum {
    const ADMIN = 'admin';
    const EMPLOYEE = 'employee';
}