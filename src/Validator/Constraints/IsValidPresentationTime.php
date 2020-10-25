<?php


namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsValidPresentationTime extends Constraint {

    public function validatedBy() {
        return IsValidPresentationTimeValidator::class;
    }
}