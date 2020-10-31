<?php


namespace App\Controller\pages\add_edit;


use App\Entity\HallEntity;
use App\Entity\MovieEntity;
use App\Entity\PresentationEntity;
use App\Model\Permission;
use App\Utils\CommonUtils;
use App\Validator\Constraints\IsValidPresentationTime;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class AddPresentationPageController extends AbstractAddPageController {

    protected function getAddPageTitle(): string {
        return 'Add Show';
    }

    protected function getAddPermissions(): array {
        return [Permission::ADD_SHOWS];
    }

    protected function getFormActionRoute(): string {
        return 'add_presentation';
    }

    protected function handleForm(): void {
        $presentationEntity = new PresentationEntity();
        $presentationEntity->setStartTime($this->form->getData()->getStartTime());
        $presentationEntity->setHall($this->form->get('hall_dropdown')->getNormData());
        $presentationEntity->setMovie($this->form->get('movie_dropdown')->getNormData());

        $this->getDoctrine()->getManager()->persist($presentationEntity);
        $this->getDoctrine()->getManager()->flush();
    }

    protected function getForm(): FormInterface {
        $presentation = new PresentationEntity();
        $presentation->setStartTime(new \DateTime());

        $halls = $this
            ->getDoctrine()
            ->getRepository(HallEntity::class, CommonUtils::resolveSlave())
            ->findAll();

        $movies = $this
            ->getDoctrine()
            ->getRepository(MovieEntity::class, CommonUtils::resolveSlave())
            ->findAll();

        return $this->getDefaultFormBuilder($presentation)
            ->add(
                'error',
                FormType::class,
                [
                    'label' => false,
                    'mapped' => false,
                    'constraints' => new IsValidPresentationTime()
                ]
            )
            ->add(
                'hall_dropdown',
                ChoiceType::class,
                [
                    'label' => 'Hall*',
                    'choice_label' => 'id',
                    'choices' => $halls,
                    'mapped' => false,
                    'constraints' => [
                        new NotBlank(),
                        new NotNull()
                    ],
                ]
            )
            ->add(
                'movie_dropdown',
                ChoiceType::class,
                [
                    'label' => 'Movie*',
                    'choice_label' => 'name',
                    'choices' => $movies,
                    'mapped' => false,
                    'constraints' => [
                        new NotBlank(),
                        new NotNull()
                    ],
                ]
            )
            ->add(
                'startTime',
                DateTimeType::class,
                [
                    'label' => 'Start Time*',
                    'empty_data' => '',
                ]
            )
            ->getForm();
    }
}