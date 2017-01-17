<?php


namespace Adv;


use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;

class Nodeping
{
    /**
     * @var ClientInterface
     */
    protected $client;
    protected $token;

    public function __construct(ClientInterface $client, $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    public function request(RequestInterface $request)
    {

    }

    public function checks()
    {

    }

}