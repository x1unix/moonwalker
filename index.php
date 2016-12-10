<?php
if (!file_exists('./vendor/autoload.php')) die('Please run composer install');

require('./vendor/autoload.php');

use x1unix\Moonwalker;
session_start();

$c = new Moonwalker\MoonwalkerClient(null);
$f = $c->getMovieByKinopoiskId(770);
var_dump($f);

?>
