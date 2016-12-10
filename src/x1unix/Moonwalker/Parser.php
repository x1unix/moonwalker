<?php
namespace x1unix\Moonwalker;


use x1unix\Moonwalker\Exceptions\MoonwalkerException;

class Parser
{
    private static $expressions = array(
        'player_api' => '~(http://moonwalk.co/api/iframe/?)([A-Za-z0-9=&_\-\?\s\.]+)~',
    );

    /**
     * Get player frame URL from response
     *
     * @param Net\Response $response
     * @return string
     * @throws MoonwalkerException
     */
    public static function getFrameUrlFromScript(Net\Response $response) {
        $script = $response->getContent();
        $results = array();
        preg_match(self::$expressions['player_api'], $script, $results);

        if (!count($results)) throw new MoonwalkerException("Failed to extract frame src from player_api JS");

        return strval($results[0]);
    }

    public static function getVideoFrameUrlFromHtml(Net\Response $response) {
        $doc = \phpQuery::newDocument($response->getContent());
        $frame_src = $doc->find('#my_player_div > iframe')->attr('src');

        // TODO: Add collection of episodes for tv shows, etc.

        unset($doc);
        return strval($frame_src);
    }
}