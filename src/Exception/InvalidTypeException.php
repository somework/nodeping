<?php


namespace Adv\Exception;


class InvalidTypeException extends \InvalidArgumentException
{
    public function __construct($name, $type, $code = 0, \Exception $previous = null)
    {
        $message = sprintf('Cant set %s with check type %s', $name, $type);
        parent::__construct($message, $code, $previous);
    }
}