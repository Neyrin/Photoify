<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

session_unset();
session_destroy();
header("Location: ../../index.php");