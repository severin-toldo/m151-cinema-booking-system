<?php


namespace App\Controller\modal;


use App\Entity\PresentationEntity;
use App\Entity\ReservationEntity;
use App\Entity\UserEntity;
use App\Service\SecurityService;
use App\Utils\CommonUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractBookModalController extends AbstractController {

    protected ?FormInterface $form = null;
    protected ?PresentationEntity $presentation = null;
    protected array $selectedSeatsIds = [];


    public function onInit(int $presentationId, Request $request, SecurityService $securityService): Response {

        if (!$this->hasUserAccess($securityService)) {
            return $this->redirectToRoute('movies');
        }

        $this->presentation = $this
            ->getDoctrine()
            ->getRepository(PresentationEntity::class)
            ->find($presentationId);

        $this->selectedSeatsIds = $this->getSelectedSeatIds($request);

        $this->form = $this->getModalForm();
        $this->form->handleRequest($request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->handleForm();
            return $this->redirectToRoute('movies');
        }

        return $this->renderModal();
    }

    // TODO clear seat ids in every case (for persist feature after login)
    protected function book(int $userId) {
        $user = $this
            ->getDoctrine()
            ->getRepository(UserEntity::class)
            ->find($userId);

        foreach ($this->selectedSeatsIds as $seatId) {
            $bookingResponse = $this
                ->getDoctrine()
                ->getRepository(ReservationEntity::class)
                ->addReservation($this->presentation, $user, $seatId);

            if (!$bookingResponse) {
                $this->addFlash('error', 'Unexpected Error occured, booking was not successful!');
                return;
            }
        }

        $this->addFlash('success', 'Show booked successfully!');
    }

    protected function getDefaultBookFormBuilder(): FormBuilderInterface {
        return $this->createFormBuilder()
            ->setAction('/' . $this->getFormActionRoute() . '/' . $this->presentation->getId())
            ->add(
                'close',
                ButtonType::class,
                ['label' => 'Close']
            )
            ->add(
                'submit',
                SubmitType::class,
                ['label' => 'Book']
            );
    }

    private function getSelectedSeatIds(Request $request): array {
        $selectedSeatIds = CommonUtils::getCookie('selectedSeats', $request);
        $selectedSeatIds = json_decode($selectedSeatIds);

        $reservations = $this
            ->getDoctrine()
            ->getRepository(ReservationEntity::class)
            ->findValidReservationsByPresentation($this->presentation);

        $reservedSeatIds = CommonUtils::getReservedSeatsByReservations($reservations);
        $allSeatIds = CommonUtils::mapToId(CommonUtils::getSeatsBySeatrows($this->presentation->getHall()->getSeatrows()));

        $validSelectedSeatids = [];

        if(!is_null($selectedSeatIds)) {
            foreach ($selectedSeatIds as $seatId) {
                if (!in_array($seatId, $reservedSeatIds) && in_array($seatId, $allSeatIds)) {
                    array_push($validSelectedSeatids, $seatId);
                }
            }
        }


        return CommonUtils::mapToInt($validSelectedSeatids);
    }

    private function hasUserAccess(SecurityService $securityService): bool {
        if ($securityService->isLoggedIn($this->getUser())) {
            if (empty($this->getRolesWithAccess())) {
                return true;
            }

            foreach ($this->getRolesWithAccess() as $roleWithAccess) {
                if ($securityService->hasRole($roleWithAccess, $this->getUser())) {
                    return true;
                }
            }
        }

        return false;
    }

    private function renderModal(array $customParams = []): Response {
        return $this->render('modal/abstract_book.modal.html.twig', [
            'modalId' => $this->getModalId(),
            'movieName' => $this->presentation->getMovie()->getName(),
            'hallId' => $this->presentation->getHall()->getId(),
            'presentation' => $this->presentation,
            'modalContentPath' => $this->getModalContentPath(),
            'form' => $this->form->createView(),
            ...$customParams
        ]);
    }

    protected abstract function getModalId(): string;
    protected abstract function getModalContentPath(): string;
    protected abstract function getFormActionRoute(): string;
    protected abstract function getModalForm(): FormInterface;
    protected abstract function handleForm(): void;
    protected abstract function getRolesWithAccess(): array;
}