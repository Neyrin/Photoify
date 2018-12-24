<?php

declare(strict_types=1);

// Start sessions
session_start();

// Set timezone
date_default_timezone_set('UTC');

// Set to UTF-8.
mb_internal_encoding('UTF-8');

// Fetch global configuration.
$config = require __DIR__.'/config.php';

// Setup database connection.
$pdo = new PDO($config['database_path']);
