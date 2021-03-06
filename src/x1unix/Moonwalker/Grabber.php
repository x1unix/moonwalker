<?php
namespace x1unix\Moonwalker;

class Grabber
{
    /**
     * Get Player's JS Script
     * @param String|int $kpId Kinopoisk ID
     * @return Net\Response
     * @throws Exceptions\MoonwalkerException
     */
    public static function getPlayerScriptByKinopoiskId($kpId)
    {
        $url = "http://moonwalk.co/player_api?kp_id={$kpId}";
        $req = new Net\Request($url);
        $resp = $req->get();

        // Check response
        $code = $resp->isSuccessful();

        if (!$code) throw new Exceptions\MoonwalkerException("Failed to get player script ({$resp->getCode()})");

        return $resp;
    }

    public static function getPlayerFrame($url) {
        $req = new Net\Request($url);
        $resp = $req->get();

        // Check response
        if (!$resp->isSuccessful()) throw new Exceptions\MoonwalkerException("Failed to get player frame ({$resp->getCode()})");

        return $resp;
    }
}

?>
