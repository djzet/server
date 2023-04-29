<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class NumberValidator extends AbstractValidator
{

    protected string $message = 'Field :field is number';

    public function rule(): bool
    {
        return is_int($this->value);
    }
}
