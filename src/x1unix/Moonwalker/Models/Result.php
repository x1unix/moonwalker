<?php

namespace x1unix\Moonwalker\Models;

use \x1unix\Moonwalker\Net;

class Result
{
    protected $response;
    protected $content;

    public function __construct(Net\Response $response, $content)
    {
        $this->response = $response;
        $this->content = $content;
    }

    public function getResponse() {
        return $this->response;
    }

    public function getContent() {
        return $this->content;
    }
}