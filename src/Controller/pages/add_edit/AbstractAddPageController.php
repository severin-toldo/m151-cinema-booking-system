<?php


namespace App\Controller\pages\add_edit;


use App\Service\SecurityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractAddPageController extends AbstractController {

    protected FormInterface $form;
    protected string $fromRoute;

    public function onInit(SecurityService $ss, Request $request): Response {
        $this->setFromRoute($request);

        if (!$ss->hasAnyPermission($this->getAddPermissions(), $this->getUser())) {
            return $this->redirect($this->fromRoute, 301);
        }

        $this->setUpForm($request);

        return $this->getResponse($this->getAddPageTitle());
    }

    protected function getResponse(string $title): Response {
        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->handleForm();
            $this->addFlash('success', 'Operation successful');
            return $this->redirect($this->fromRoute, 301);
        }

        return $this->render('pages/add_edit/abstract_add_edit.page.html.twig', [
            'pageTitle' => $title,
            'form' => $this->form->createView(),
        ]);
    }

    protected function setFromRoute(Request $request): void {
        $this->fromRoute = $request->get('from') ? $request->get('from') : 'movies';
    }

    protected function setUpForm(Request $request): void {
        $this->form = $this->getForm();
        $this->form->handleRequest($request);
    }

    protected function getDefaultFormBuilder($data): FormBuilderInterface {
        return $this->createFormBuilder($data)
            ->setAction($this->buildFormActionRoute())
            ->add(
                'submit',
                SubmitType::class,
                ['label' => 'Save']
            )
            ->add(
                'reset',
                ResetType::class,
                ['label' => 'Reset']
            );
    }

    protected function buildFormActionRoute(): string {
        return '/' . $this->getFormActionRoute() . '?from=' . $this->fromRoute;
    }

    protected abstract function getAddPageTitle(): string;
    protected abstract function getAddPermissions(): array;
    protected abstract function getFormActionRoute(): string;
    protected abstract function handleForm(): void;
    protected abstract function getForm(): FormInterface;
}