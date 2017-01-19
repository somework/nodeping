<?php


namespace Adv\Nodeping\Checks\Fields;

class Type
{
    const AUDIO = 'AUDIO';
    const DNS = 'DNS';
    const FTP = 'FTP';
    const HTTP = 'HTTP';
    const HTTPADV = 'HTTPADV';
    const HTTPCONTENT = 'HTTPCONTENT';
    const HTTPPARSE = 'HTTPPARSE';
    const IMAP4 = 'IMAP4';
    const MYSQL = 'MYSQL';
    const NTP = 'NTP';
    const PING = 'PING';
    const POP3 = 'POP3';
    const PORT = 'PORT';
    const RBL = 'RBL';
    const RDP = 'RDP';
    const SIP = 'SIP';
    const SMTP = 'SMTP';
    const SSH = 'SSH';
    const SSL = 'SSL';
    const WEBSOCKET = 'WEBSOCKET';

    public static function get()
    {
        return [
            static::AUDIO,
            static::DNS,
            static::FTP,
            static::HTTP,
            static::HTTPADV,
            static::HTTPADV,
            static::HTTPCONTENT,
            static::HTTPPARSE,
            static::IMAP4,
            static::MYSQL,
            static::MYSQL,
            static::MYSQL,
            static::NTP,
            static::PING,
            static::POP3,
            static::PORT,
            static::RBL,
            static::RDP,
            static::SIP,
            static::SMTP,
            static::SSH,
            static::SSL,
            static::WEBSOCKET,
        ];
    }
}