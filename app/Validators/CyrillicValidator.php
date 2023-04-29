<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class CyrillicValidator extends AbstractValidator
{
    protected string $message = 'Field :field is cyrillic';

    public function rule(): bool
    {
        return preg_match("/^[А-яЁё-]+$/", $this->value);
    }
}