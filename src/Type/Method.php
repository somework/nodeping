<?php


namespace Adv\Type;


use Adv\Exception\InvalidArgumentTypeException;

class Method
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const HEAD = 'HEAD';
    const TRACE = 'TRACE';
    const CONNECT = 'CONNECT';

    protected $code;

    public function __construct($type)
    {
        $this->code = $type;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return Method
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setCode($code)
    {
        if (!in_array($code, [
            static::GET,
            static::POST,
            static::PUT,
            static::HEAD,
            static::TRACE,
            static::CONNECT,
        ], true)
        ) {
            throw new InvalidArgumentTypeException('method', $code);
        }
        $this->code = $code;
        return $this;
    }
}