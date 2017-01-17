<?php


namespace Adv\Checks;


use Adv\Exception\InvalidArgumentTypeException;

class CheckType
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

    /**
     * @var string
     */
    protected $code;

    public function __construct($code)
    {
        $this->setCode($code);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setCode($code)
    {
        if (!in_array($code, [
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
        ], true)
        ) {
            throw new InvalidArgumentTypeException('type', $code);
        }
        $this->code = $code;
        return $this;
    }

    public static function getTypes()
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