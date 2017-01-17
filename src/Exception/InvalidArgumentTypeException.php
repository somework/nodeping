<?php

namespace Adv\Exception;

class InvalidArgumentTypeException extends \InvalidArgumentException
{
    /**
     * InvalidArgumentTypeException constructor.
     *
     * @param string          $name
     * @param mixed           $type
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct($name, $type, $code = 0, \Exception $previous = null)
    {
        $message = sprintf('Value type %s for %s not supported. Must be string', $type, $name);
        parent::__construct($message, $code, $previous);
    }
}