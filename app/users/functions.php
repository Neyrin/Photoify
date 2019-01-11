<?php
declare(strict_types=1);
//Redirect function
function redirect(string $path = '/index.php')
{
    header('location:' . $path);
    die();
}