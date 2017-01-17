<?php


namespace Adv\Type;


use Adv\Exception\InvalidArgumentTypeException;

class RunLocation
{
    const NORTH_AMERICA = 'nam';
    const EUROPE = 'eur';
    const EAST_ASIA_OCEANIA = 'eao';
    const WORLDWIDE = 'wlw';

    protected $location;

    public function __construct($location)
    {
        $this->setLocation($location);
    }

    public static function getPossibleLocations()
    {
        return [
            static::NORTH_AMERICA,
            static::EUROPE,
            static::EAST_ASIA_OCEANIA,
            static::WORLDWIDE,
        ];
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     *
     * @return RunLocation
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setLocation($location)
    {
        if (!in_array($location, static::getPossibleLocations(), true)) {
            throw new InvalidArgumentTypeException('runlocations', $location);
        }
        $this->location = $location;
        return $this;
    }
}