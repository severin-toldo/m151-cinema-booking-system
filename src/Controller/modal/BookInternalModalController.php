<?php


namespace App\Controller\modal;


use App\Entity\UserEntity;
use App\Model\Role;
use App\Model\UserChoice;
use App\Utils\CommonUtils;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;

class BookInternalModalController extends AbstractBookModalController {

    protected function getModalId(): string {
        return 'bookInternalModal';
    }

    protected function getModalContentPath(): string {
        return 'modal/book_internal.modal.html.twig';
    }

    protected function getFormActionRoute(): string {
        return 'book_internal';
    }

    protected function getModalForm(): FormInterface {
        $users = $this
            ->getDoctrine()
            ->getRepository(UserEntity::class, CommonUtils::resolveSlave())
            ->findAll();

        $choices = [];

        foreach ($users as $user) {
            $choice = new UserChoice();
            $choice->setUserId($user->getId());
            $choice->setEmail($user->getEmail());
            array_push($choices, $choice);
        }

        return $this->getDefaultBookFormBuilder()
            ->add(
                'user_dropdown',
                ChoiceType::class,
                [
                    'label' => 'Select User:',
                    'choice_label' => 'email',
                    'choices' => $choices,
                ]
            )
            ->getForm();
    }

    protected function handleForm(): void {
        $userId = $this->form->getData()['user_dropdown']->getUserId();
        $this->book($userId);
    }

    protected function getRolesWithAccess(): array {
        return [Role::ADMIN, Role::EMPLOYEE];
    }
}
