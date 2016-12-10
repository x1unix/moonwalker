<?php
if (!file_exists('./vendor/autoload.php')) die('Please run composer install');

require('./vendor/autoload.php');

use x1unix\Moonwalker;
session_start();

$c = new Moonwalker\Client(null);

try {
    $f = $c->getMovieByKinopoiskId(770);
    var_dump($f);
} catch (x1unix\Moonwalker\Exceptions\MoonwalkerNotFoundException $ex) {
    echo 'Movie not found: <br /><pre>'. $ex->getMessage() . '</pre>';
} catch (Exception $ex) {
    echo 'Error: '.$ex->getMessage();
}

?>
