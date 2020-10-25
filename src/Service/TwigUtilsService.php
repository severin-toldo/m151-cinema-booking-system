<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\RequestStack;

class TwigUtilsService {

    protected RequestStack $requestStack;

    public function __construct(RequestStack $requestStack) {
        $this->requestStack = $requestStack;
    }

    /**
     * @return string current route by master request
     */
    public function getCurrentRoute(): string {
        $request = $this->requestStack->getMasterRequest();
        return $request->get('_route');
    }
}