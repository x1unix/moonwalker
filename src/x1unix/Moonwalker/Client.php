<?php
namespace x1unix\Moonwalker;


use x1unix\Moonwalker\Exceptions\MoonwalkerException;
use x1unix\Moonwalker\Exceptions\MoonwalkerNotFoundException;

class Client
{
    private $hostname = '';
    public function __construct($hostname)
    {
        $this->hostname = $hostname;
    }

    public function getMovieByKinopoiskId($kpId) {
        $frame = $this->getFrameUrl($kpId);
        return $frame;
    }

    private function getFrameUrl($kpId) {

        $resp = Grabber::getPlayerScriptByKinopoiskId($kpId);
        //file_put_contents('./data/player_api', $script);
        //$script = file_get_contents('./data/player_api');
        $path = Parser::getFrameUrlFromScript($resp);

        unset($script);
        return $path;
    }
}