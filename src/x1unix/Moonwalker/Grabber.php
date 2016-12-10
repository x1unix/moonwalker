<?php
namespace x1unix\Moonwalker;

class Grabber
{
    public static function getPlayerScriptByKinopoiskId($kpId)
    {
        $url = "http://moonwalk.co/player_api?kp_id={$kpId}";
        $client = new \GuzzleHttp\Client(array(
            'headers' => Headers::getDefaultHeaders()
        ));
        $resp = $client->request('GET', $url);

        // Check response
        $code = $resp->getStatusCode();

        if ($code >= 301) throw new Exceptions\MoonwalkerException("Failed to get player script, HTTP Error: {$code}");

        return $resp->getBody()->getContents();
    }
}

?>
