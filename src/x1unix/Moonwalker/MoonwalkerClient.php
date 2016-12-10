<?php
namespace x1unix\Moonwalker;


class MoonwalkerClient
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
        $script = Grabber::getPlayerScriptByKinopoiskId($kpId);
        $path = Parser::getFrameUrlFromScript($script);

        unset($script);
        return $path;
    }
}