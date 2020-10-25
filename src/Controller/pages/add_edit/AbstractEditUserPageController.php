<?php


namespace App\Controller\pages\add_edit;


use App\Service\UserService;
use Symfony\Component\Form\FormInterface;

abstract class AbstractEditUserPageController extends AbstractEditPageController {

    protected UserService $us;

    public function __construct(UserService $us) {
        $this->us = $us;
    }

    protected function buildFormActionRoute(): string {
        return parent::buildFormActionRoute() . '&dataId=' . $this->dataId;
    }

    protected function getForm(): FormInterface {
        return $this->editMode ? $this->getEditForm() : $this->getAddForm();
    }

    protected function getEditForm(): FormInterface {
        $fb = $this->createFormBuilder($this->data);
        $excludedFieldNames = ['plainPassword', 'agreeTerms'];

        return $this->us->buildUserForm($fb, $this->buildFormActionRoute(), $excludedFieldNames);
    }

    protected function getAddForm(): FormInterface {
        $fb = $this->createFormBuilder($this->us->getEmptyUserEntity());
        $excludedFieldNames = ['agreeTerms'];

        return $this->us->buildUserForm($fb, $this->buildFormActionRoute(), $excludedFieldNames);
    }

    protected function saveUser(array $roles = []): void {
        $user = $this->form->getData();

        if ($this->editMode) {
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();
        } else {
            $this->us->saveUserAndPassword($user, $roles);
        }
    }
}