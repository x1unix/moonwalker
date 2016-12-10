<?php

namespace x1unix\Moonwalker;

use GuzzleHttp;

class MoonwalkResponse
{
    private $content = null;
    private $cookies = null;
    private $body = null;
    private $status = 0;

    public function __construct(GuzzleHttp\Psr7\Response $response)
    {
        $this->body = $response->getBody();
        $this->content = $this->body->getContents();
        $this->cookies = $response->getHeader('Set-Cookie');
        $this->status = $response->getStatusCode();
    }

    public function getCookies() {
        return $this->cookies;
    }

    public function getContent() {
        return $this->content;
    }

    public function getBody() {
        return $this->body;
    }

    public function isSuccessfull() {
        return ($this->status >=200) && ($this->status < 400);
    }

    public function getCode() {
        return $this->status;
    }
}