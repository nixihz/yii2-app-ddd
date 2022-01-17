<?php

namespace internal\base\dto;

class Error
{
    public string|int $code;

    public string $message;

    public array $errors;

    public function __construct($code, $message, $errors)
    {
        $this->code = $code;
        $this->message = $message;
        $this->errors = $errors;
    }

}
