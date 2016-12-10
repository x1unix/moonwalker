<?php
namespace x1unix\Moonwalker\Exceptions;

use Exception;

class MoonwalkerException extends \Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}