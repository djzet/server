<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LatinValidator extends AbstractValidator
{
    protected string $message = 'Field :field is latin';

    public function rule(): bool
    {
        return preg_match("/^[A-z-]+$/", $this->value);
    }
}