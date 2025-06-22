<?php

// Set proper error reporting for production
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors', 0);

// Set timezone if needed
date_default_timezone_set('Asia/Jakarta');

// Include Laravel
require __DIR__ . '/../public/index.php';
