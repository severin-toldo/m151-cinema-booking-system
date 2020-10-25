<?php


namespace App\Controller\components\cards;


use App\Service\SecurityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractButtonGroupCardComponentController extends AbstractController {

    public function onInit(): Response {
        return $this->render('components/cards/abstract_button_group_card.component.twig', [
            'cardTitle' => $this->getCardTitle(),
            'cardText' => $this->getCardText(),
            'buttons' => $this->getButtons()
        ]);
    }

    protected abstract function getCardTitle(): string;
    protected abstract function getCardText(): string;
    protected abstract function getButtons(): array;
}