<?php
namespace x1unix\Moonwalker;


class Headers
{
    const H_MAIN = array(
        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Encoding' => 'gzip, deflate, sdch',
        'Accept-Language' => 'ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4,uk;q=0.2,be;q=0.2,de;q=0.2,pt;q=0.2',
        'Cache-Control' => 'no-cache',
        'Connection' => 'keep-alive',
        'Host' => 'moonwalk.co',
        'Referer' => 'http://avi.x1unix.com/',
        'Pragma' => 'no-cache',
        'User-Agent' => 'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) '
            . 'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 '
            . 'Mobile Safari/537.36'
    );

    public static function getDefaultHeaders()
    {
        return self::H_MAIN;
    }
}