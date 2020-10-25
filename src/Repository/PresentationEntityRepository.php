<?php
namespace App\Repository;

use App\Entity\PresentationEntity;
use Doctrine\ORM\EntityRepository;

class PresentationEntityRepository extends EntityRepository {

    public function ableToAddPresentation(PresentationEntity $newPres): bool {
        $existingPresentations = $this->findBy([
            'hall' => $newPres->getHall(),
            'valid' => true,
        ]);

        $results = [];

        foreach ($existingPresentations as $exiPres) {
            $result = (
                ($newPres->getStartTime() >= $exiPres->getStartTime() && $newPres->getStartTime() <= $exiPres->getEndTime()) ||
                ($newPres->getEndTime() >= $exiPres->getStartTime() && $newPres->getEndTime() <= $exiPres->getEndTime())
            );

            array_push($results, $result);
        }

        return !in_array(true, $results);
    }
}