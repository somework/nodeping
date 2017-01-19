<?php
/**
 * Created by PhpStorm.
 * User: pinchuk
 * Date: 1/18/17
 * Time: 11:47 AM
 */

namespace Adv\Nodeping\Checks\Fields;


class RunLocations
{
    const NORTH_AMERICA = 'nam';
    const EUROPE = 'eur';
    const EAST_ASIA_OCEANIA = 'eao';
    const WORLDWIDE = 'wlw';

    public static function get()
    {
        return [
            static::NORTH_AMERICA,
            static::EUROPE,
            static::EAST_ASIA_OCEANIA,
            static::WORLDWIDE,
        ];
    }
}