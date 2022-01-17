<?php

namespace internal\base\dto;

class SuccessResponseDto
{
    public string $apiVersion;

    public string $method;

    public DataInterface $data;
}