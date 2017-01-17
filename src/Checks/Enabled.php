<?php


namespace Adv\Checks;


class Enabled
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';

    public static function getEnabledVariants()
    {
        return [
            static::ACTIVE,
            static::INACTIVE,
        ];
    }
}