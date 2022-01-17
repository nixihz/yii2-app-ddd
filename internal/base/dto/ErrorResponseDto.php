<?php

namespace internal\base\dto;

class ErrorResponseDto
{

    public string $apiVersion;

    public string $method;

    public Error $error;

}