<?php

// Paksa tampilkan error PHP jika terjadi crash di awal
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Pastikan folder sementara di /tmp tersedia karena sistem file Vercel bersifat read-only
$directories = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/testing',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Arahkan cache bootstrap Laravel ke /tmp
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';
$_ENV['APP_ROUTES_CACHE']   = '/tmp/bootstrap/cache/routes.php';
$_ENV['APP_CONFIG_CACHE']   = '/tmp/bootstrap/cache/config.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Jalankan Laravel seperti biasa
require __DIR__ . '/../public/index.php';