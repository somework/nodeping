<?php


namespace Adv\Checks;


use GuzzleHttp\ClientInterface;

class Service
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /** @noinspection MoreThanThreeArgumentsInspection
     * @param string $customerId
     * @param string $id
     * @param bool $lastResult
     * @param bool $current
     */
    public function get($customerId = null, $id = null, $lastResult = null, $current = null)
    {

    }
}