<?php


namespace App\Controller;


use App\Model\Role;
use App\Service\SecurityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends AbstractController {

    public function onInit(SecurityService $ss): Response {

        if (!$ss->isInternal($this->getUser())) {
            return $this->redirect('movies', 301);
        }

        return $this->render('employee.html.twig');
    }

}