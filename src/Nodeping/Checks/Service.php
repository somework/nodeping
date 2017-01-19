<?php
/**
 * Created by PhpStorm.
 * User: pinchuk
 * Date: 1/18/17
 * Time: 1:10 PM
 */

namespace Adv\Nodeping\Checks;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Service
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;
    /**
     * @var \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    protected $validator;

    public function __construct(ClientInterface $client, ValidatorInterface $validator)
    {

        $this->client = $client;
        $this->validator = $validator;
    }

    /** @noinspection MoreThanThreeArgumentsInspection
     * @param string      $id
     * @param string|null $customerId
     * @param bool|null   $lastResult
     * @param bool|null   $current
     *
     * @return Check[]|Check
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id = null, $customerId = null, $lastResult = null, $current = null)
    {
        $query = [];
        if ($customerId) {
            $query['customerid'] = $customerId;
        }
        if ($id) {
            $query['id'] = $id;
        }
        if ($lastResult) {
            $query['lastresult'] = (bool)$lastResult;
        }
        if ($current) {
            $query['current'] = (bool)$current;
        }

        $response = $this->client->request('GET', 'checks', [RequestOptions::QUERY => $query]);

        return $response->getStatusCode() === 200 ? $response->getBody()->getContents() : '';
    }

}