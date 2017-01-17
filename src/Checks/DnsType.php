<?php


namespace Adv\Checks;


use Adv\Exception\InvalidArgumentTypeException;

class DnsType
{
    const ANY = 'ANY';
    const A = 'A';
    const AAAA = 'AAAA';
    const CNAME = 'CNAME';
    const MX = 'MX';
    const NS = 'NS';
    const PTR = 'PTR';
    const SOA = 'SOA';
    const TXT = 'TXT';

    protected $type;

    public function __construct($type)
    {
        $this->setType($type);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return string
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setType($type)
    {
        if (!in_array($type, [
            static::ANY,
            static::A,
            static::AAAA,
            static::CNAME,
            static::MX,
            static::NS,
            static::PTR,
            static::SOA,
            static::TXT,
        ], true)
        ) {
            throw new InvalidArgumentTypeException('dnstype', $type);
        }
        $this->type = $type;
        return $this;
    }
}