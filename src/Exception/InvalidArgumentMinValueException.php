<?php


namespace Adv\Exception;


class InvalidArgumentMinValueException extends \InvalidArgumentException
{
    /**
     * InvalidArgumentMinValueException constructor.
     *
     * @param string          $name
     * @param int             $minvalue
     * @param int             $value
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct($name, $minvalue, $value, $code = 0, \Exception $previous = null)
    {
        $message = sprintf(
            'Minimum value for %s is %s. %s passed',
            $name,
            $minvalue,
            $value
        );
        parent::__construct($message, $code, $previous);
    }
}