<?php
require_once __DIR__ . '/../app/core/autoload.php';

require_once __DIR__ . '/../app/init.php';

// Debug Working Directory
echo "Current working directory: " . getcwd() . "<br>";
echo "__DIR__: " . __DIR__ . "<br>";
echo "Script path: " . $_SERVER['SCRIPT_FILENAME'] . "<br>";

$app = new App;