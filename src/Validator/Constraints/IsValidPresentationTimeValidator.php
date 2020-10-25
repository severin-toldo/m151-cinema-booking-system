<?php


namespace App\Validator\Constraints;


use App\Entity\PresentationEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class IsValidPresentationTimeValidator extends ConstraintValidator {

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function validate($value, Constraint $constraint) {
        if (!$constraint instanceof IsValidPresentationTime) {
            throw new UnexpectedTypeException($constraint, IsValidPresentationTime::class);
        }

        $hall = $this->context->getRoot()->get('hall_dropdown')->getNormData();
        $movie = $this->context->getRoot()->get('movie_dropdown')->getNormData();
        $startTime = $this->context->getRoot()->getData()->getStartTime();

        $newPres = new PresentationEntity();
        $newPres->setHall($hall);
        $newPres->setMovie($movie);
        $newPres->setStartTime($startTime);

        $ableToAddPresentation = $this->em
            ->getRepository(PresentationEntity::class)
            ->ableToAddPresentation($newPres);

        if (!$ableToAddPresentation) {
            throw new UnexpectedValueException("", "valid Presentation. Presentation already exists in this Hall and with this Movie and Date");
        }

        return;
    }
}