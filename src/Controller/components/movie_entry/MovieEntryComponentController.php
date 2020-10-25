<?php


namespace App\Controller\components\movie_entry;


use App\Entity\MovieEntity;
use App\Entity\PresentationEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class MovieEntryComponentController extends AbstractController {

    public function onInit(MovieEntity $movie, bool $isListView): Response {
        return $isListView ? $this->onInitListView($movie) : $this->onInitSingleView($movie);
    }

    private function onInitListView(MovieEntity $movie): Response {
        return $this->render('components/movie_entry/movie_entry.component.html.twig', [
            'movie' => $movie,
            'isListView' => true,
            'presentations' => [],
            'selectedPresentationId' => null
        ]);
    }

    private function onInitSingleView(MovieEntity $movie): Response {
        $presentations = $this
            ->getDoctrine()
            ->getRepository(PresentationEntity::class)
            ->findBy(
                array('movie' => $movie, 'valid' => true),
                array('startTime' => 'ASC')
            );

        $selectedPresentationId = sizeof($presentations) > 0 ? $this->resolveSelectedPresentationId($presentations) : null;

        return $this->render('components/movie_entry/movie_entry.component.html.twig', [
            'movie' => $movie,
            'isListView' => false,
            'presentations'  => $presentations,
            'selectedPresentationId' => $selectedPresentationId
        ]);
    }

    private function resolveSelectedPresentationId(array $presentations): int {
        if (isset($_GET['presId'])) {
            $selectedPresentationId = $_GET['presId'];
            $selectedPresentationId = strip_tags($selectedPresentationId);

            if ($this->isValidPresentationId($selectedPresentationId, $presentations)) {
                return $selectedPresentationId;
            }
        }

        return $presentations[0]->getId();
    }

    private function isValidPresentationId($presId, array $presentations): bool {
        if (is_numeric($presId)) {
            foreach ($presentations as $pres) {
                if ($pres->getId() == $presId) {
                    return true;
                }
            }
        }

        return false;
    }
}