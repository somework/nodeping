<?php
/**
 * Created by PhpStorm.
 * User: pinchuk
 * Date: 1/18/17
 * Time: 11:44 AM
 */

namespace Adv\Nodeping\Checks\Fields;


class Method
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const HEAD = 'HEAD';
    const TRACE = 'TRACE';
    const CONNECT = 'CONNECT';

    public static function get()
    {
        return [
            static::GET,
            static::POST,
            static::PUT,
            static::HEAD,
            static::TRACE,
            static::CONNECT,
        ];
    }
}
