<?php


namespace App\Controller\modal;



use Symfony\Component\Form\FormInterface;

class BookCustomerModalController extends AbstractBookModalController {

    protected function getModalId(): string {
        return 'bookCustomerModal';
    }

    protected function getModalContentPath(): string {
        return 'modal/book_customer.modal.html.twig';
    }

    protected function getFormActionRoute(): string {
        return 'book_customer';
    }

    protected function getModalForm(): FormInterface {
        return $this->getDefaultBookFormBuilder()->getForm();
    }

    protected function handleForm(): void {
        $this->book($this->getUser()->getId());
    }

    protected function getRolesWithAccess(): array {
        return [];
    }
}