<?php
if (!file_exists('./vendor/autoload.php')) die('Please run composer install');

require('./vendor/autoload.php');

use x1unix\Moonwalker;
session_start();

// $r = Moonwalker\Grabber::getPlayerScriptByKinopoiskId(770);
$r = file_get_contents('./src/x1unix/Moonwalker/data/player_api');
$results = array();
preg_match('~(http://moonwalk.co/api/iframe/?)([A-Za-z0-9=&_\-\?\s\.]+)~', $r, $results);

if (count($results) > 0) var_dump($results[0]);
?>
