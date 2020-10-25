<?php


namespace App\Controller\pages\add_edit;


use App\Service\SecurityService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractEditPageController extends AbstractAddPageController {

    protected ?int $dataId = null;
    protected bool $editMode = false;
    protected $data;

    public function onInit(SecurityService $ss, Request $request): Response {
        $this->setFromRoute($request);

        $this->dataId = is_numeric($request->get('dataId')) ? intval($request->get('dataId')) : null;

        if (!!$this->dataId && $ss->hasAnyPermission($this->getEditPermissions(), $this->getUser())) {
            $this->data = $this->getData();
        }

        $this->editMode = !!$this->data;

        if (!$this->editMode) {
            return parent::onInit($ss, $request);
        }

        $this->setUpForm($request);

        return $this->getResponse($this->getEditPageTitle());
    }

    protected abstract function getEditPageTitle(): string;
    protected abstract function getEditPermissions(): array;
    protected abstract function getData();
}