<?php
if (!file_exists('./vendor/autoload.php')) die('Please run composer install');

require('./vendor/autoload.php');

use x1unix\Moonwalker;
session_start();

$r = Moonwalker\Grabber::getPlayerScriptByKinopoiskId(770);
print_r($r);
?>
