<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class CountValidator extends AbstractValidator
{
    protected string $message = 'Field :field is count > 1';

    public function rule(): bool
    {
        return preg_match("/^(?=.*[1-5])+$/", $this->value);
    }
}