<?php

namespace Adv\Nodeping\Checks\Factory;

use Adv\Nodeping\Checks\Check;
use Psr\Http\Message\ResponseInterface;

class Get
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @throws \RuntimeException
     */
    public static function build(ResponseInterface $response)
    {
        $data = \GuzzleHttp\json_decode($response->getBody()->getContents());
    }

    public static function buildFromArray(array $data)
    {
        return (new Check($data['type']))
            ->setId($data['_id']);
    }
}