<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class NumberValidator extends AbstractValidator
{

    protected string $message = 'Field :field is number';

    public function rule(): bool
    {
        return preg_match("/^([0-9]+)$/u", $this->value);
    }
}
