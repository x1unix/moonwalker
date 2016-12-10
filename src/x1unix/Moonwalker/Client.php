<?php
namespace x1unix\Moonwalker;

class Client
{
    private $hostname = '';

    public function __construct($hostname)
    {
        $this->hostname = $hostname;
    }

    public function getMovieByKinopoiskId($kpId)
    {
        return $this->getFrameHtml(
            $this->getFrameUrlByKinopoiskId($kpId)
        )->getContent();
    }


    public function getFrameUrlByKinopoiskId($kpId) {
        $frmResp = Grabber::getPlayerScriptByKinopoiskId($kpId);
        $frmUrl = Parser::getFrameUrlFromScript($frmResp);

        return new Models\Result($frmResp, $frmUrl);
    }

    public function getFrameHtml(Models\Result $frameUrlResult) {
        $url = $frameUrlResult->getContent();

        $resp = Grabber::getPlayerFrame($url);
        $frame_url = Parser::getVideoFrameUrlFromHtml($resp);

        return new Models\Result($resp, $frame_url);
    }
}