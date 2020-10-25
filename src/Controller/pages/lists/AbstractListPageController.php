<?php


namespace App\Controller\pages\lists;


use App\Service\SecurityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractListPageController extends AbstractController {

    public function onInit(SecurityService $ss): Response {
        if (!$ss->hasAnyPermission($this->getViewPermissions(), $this->getUser())) {
            return $this->redirect('movies', 301);
        }

        return $this->render('pages/lists/abstract_list_view.page.html.twig', [
            'pageTitle' => $this->getTitle(),
            'items' => $this->getListData(),
            'isClickable' => $this->isClickable(),
            'onClickRoute' => $this->onClickRoute(),
        ]);
    }

    protected abstract function getViewPermissions(): array;
    protected abstract function getListData(): array;
    protected abstract function getTitle(): string;

    /**
     * Default values which can be overwritten
     */

    protected function isClickable(): bool {
        return false;
    }

    protected function onClickRoute(): string {
        return '';
    }
}