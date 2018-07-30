<?php

/*
 * This file allows use the built-in PHP web server so serve the app.
 * How to use:
 * 
 * 1. Type on the command line:
 * php -S localhost:8383 serve.php
 * 
 * 2. Point your browser to:
 * http://localhost:8384/
 * 
 * You should see your web app pages
 */

$uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|php)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

require_once __DIR__ . '/public/index.php';
