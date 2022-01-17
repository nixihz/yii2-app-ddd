<?php
return [
    'site' => 'app-in-ddd.demo.com',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    'error.code' => require __DIR__ . '/error-code.php',
    'events' => require __DIR__ . '/events.php',

    // some other params
];
