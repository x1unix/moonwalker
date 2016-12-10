<?php
namespace x1unix\Moonwalker;

class Grabber
{
    /**
     * Get Player's JS Script
     * @param String|int $kpId Kinopoisk ID
     * @return MoonwalkResponse
     * @throws Exceptions\MoonwalkerException
     */
    public static function getPlayerScriptByKinopoiskId($kpId)
    {
        $url = "http://moonwalk.co/player_api?kp_id={$kpId}";
        $client = new \GuzzleHttp\Client(array(
            'headers' => Headers::getDefaultHeaders()
        ));
        $resp = new MoonwalkResponse($client->request('GET', $url));

        // Check response
        $code = $resp->isSuccessfull();

        if (!$code) throw new Exceptions\MoonwalkerException("Failed to get player script, HTTP Error: {$resp->getCode()}");

        return $resp;
    }

    public static function getPlayerFrame($src) {

    }
}

?>
