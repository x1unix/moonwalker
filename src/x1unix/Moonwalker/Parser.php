<?php
namespace x1unix\Moonwalker;


use x1unix\Moonwalker\Exceptions\MoonwalkerException;

class Parser
{
    private static $expressions = array(
        'player_api' => '~(http://moonwalk.co/api/iframe/?)([A-Za-z0-9=&_\-\?\s\.]+)~',
    );

    public static function getFrameUrlFromScript($script) {
        $results = array();
        preg_match(self::$expressions['player_api'], $script, $results);

        if (!count($results)) throw new MoonwalkerException("Failed to extract frame src from player_api JS");

        return $results[0];
    }
}