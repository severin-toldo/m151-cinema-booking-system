<?php


namespace App\Controller\components;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;


class ImageViewerComponentController extends AbstractController {

    public function onInit(string $fileName): BinaryFileResponse {
        $file = new File($this->getParameter('kernel.project_dir') . '/public/images/' . $fileName);
        return new BinaryFileResponse($file);
    }
}