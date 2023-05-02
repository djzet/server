<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LatinValidator extends AbstractValidator
{
    protected string $message = 'Field :field is latin';

    public function rule(): bool
    {
        return preg_match("/^([a-zA-Z]+)$/u", $this->value);
    }
}