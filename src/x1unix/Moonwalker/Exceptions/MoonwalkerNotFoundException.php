<?php
namespace x1unix\Moonwalker\Exceptions;

use Exception;

class MoonwalkerNotFoundException extends MoonwalkerException
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}