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

    public function getMovieByKinopoiskId($kpId)
    {
        $frame = $this->getFrameUrlByKinopoiskId($kpId);

        // return $frame;
    }


    public function getFrameUrlByKinopoiskId($kpId) {
        $frmResp = Grabber::getPlayerScriptByKinopoiskId($kpId);
        $frmUrl = Parser::getFrameUrlFromScript($frmResp);

        return new Models\Result($frmResp, $frmUrl);
    }
}