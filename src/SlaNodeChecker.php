<?php
/**
 * Created by PhpStorm.
 * User: pinchuk
 * Date: 1/17/17
 * Time: 5:21 PM
 */

namespace Adv;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\RequestOptions;

class SlaNodeChecker
{
    /**
     * @var ClientInterface
     */
    protected $client;
    protected $token;

    protected $checks = [];
    protected $filterTypes = [];
    protected $fromDate;

    public function __construct(ClientInterface $client, $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    public function loadChecks()
    {
        try {
            $response = $this->client->request(
                'GET',
                new Uri('checks'),
                [RequestOptions::QUERY => ['token' => $this->token]]
            );

            if ($response->getStatusCode() === 200) {
                $this->setChecks(\GuzzleHttp\json_decode($response->getBody(), true));
            }
        } catch (\Exception $exception) {
        }
        return $this;
    }

    public function loadUptime()
    {
        $params = [
            'token'    => $this->token,
            'interval' => 'days',
        ];

        if ($this->fromDate instanceof \DateTime) {
            $params['start'] = $this->fromDate->format(\DateTime::ATOM);
        }

        foreach ($this->getChecks() as $id => $check) {
            $response = $this->client->request(
                'POST',
                new Uri('/results/uptime/' . $check['_id']),
                [
                    RequestOptions::FORM_PARAMS => $params,
                ]
            );

            if ($response->getStatusCode() === 200) {
                $check['uptime'] = \GuzzleHttp\json_decode($response->getBody());
                $this->setCheck($id, $check);
            }
        }
    }

    /**
     * @return array
     */
    public function getChecks()
    {
        return $this->checks;
    }

    /**
     * @param array $checks
     *
     * @return static
     */
    public function setChecks(array $checks = [])
    {
        $this->checks = empty($this->filterTypes) ? $checks : array_filter($checks, function ($val) {
            return in_array($val['type'], $this->filterTypes, false);
        });
        return $this;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    protected function setCheck($key, $value)
    {
        $this->checks[$key] = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     *
     * @return static
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return array
     */
    public function getFilterTypes()
    {
        return $this->filterTypes;
    }

    /**
     * @param array $filterTypes
     *
     * @return $this
     */
    public function setFilterTypes(array $filterTypes = [])
    {
        $this->filterTypes = $filterTypes;
        return $this;
    }

    /**
     * @param \DateTime $fromDate
     *
     * @return SlaNodeChecker
     */
    public function setFromDate(\DateTime $fromDate)
    {
        $this->fromDate = $fromDate;
        return $this;
    }


    public function getChecks()



}