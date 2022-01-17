<?php

// load .env file
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__) . "/config");
$dotenv->load();

if (!function_exists("env")) {
    function env($name, $default = null)
    {
        if (!isset($_ENV[$name])) {
            return $default;
        }

        $value = $_ENV[$name];

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }

        if (preg_match('/\A([\'"])(.*)\1\z/', $value, $matches)) {
            return $matches[2];
        }

        return $value;
    }
}