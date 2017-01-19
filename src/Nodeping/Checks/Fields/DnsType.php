<?php


namespace Adv\Nodeping\Checks\Fields;


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

    public static function get()
    {
        return [
            static::ANY,
            static::A,
            static::AAAA,
            static::CNAME,
            static::MX,
            static::NS,
            static::PTR,
            static::SOA,
            static::TXT,
        ];
    }
}