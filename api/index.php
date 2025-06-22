<?php

// Vercel PHP bootstrap
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
}

// Set correct path for Laravel
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Include Laravel's public index
require __DIR__ . '/../public/index.php';
