<?php


namespace Adv\Checks;


use Adv\Exception\InvalidArgumentMinValueException;
use Adv\Exception\InvalidArgumentTypeException;
use Adv\Exception\InvalidTypeException;
use Adv\Type\Method;
use Adv\Type\Notification;
use Adv\Type\RunLocation;

class Check
{
    const DEFAULT_INTERVAL = 15;
    const DEFAULT_ENABLED = false;
    const DEFAULT_PUBLIC = false;
    const DEFAULT_THRESHOLD = 5;
    const DEFAULT_SENS = 2;
    const DEFAULT_DEP = false;
    const DEFAULT_CONTENTSTRING = '';

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $customerId;

    /**
     * @var CheckType
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $target;

    /**
     * @var string|null
     */
    protected $label;

    /**
     * @var int
     */
    protected $interval = Check::DEFAULT_INTERVAL;

    /**
     * @var bool
     */
    protected $enabled = Check::DEFAULT_ENABLED;

    /**
     * @var bool
     */
    protected $public = Check::DEFAULT_PUBLIC;

    /**
     * @var RunLocation[]
     */
    protected $runLocations = [];

    /**
     * @var int
     */
    protected $threshold = Check::DEFAULT_THRESHOLD;

    /**
     * @var int
     */
    protected $sens = Check::DEFAULT_SENS;

    /**
     * @var Notification[]
     */
    protected $notifications;

    /**
     * @var string|false
     */
    protected $dep = Check::DEFAULT_DEP;

    /**
     * @var string
     */
    protected $contentString = Check::DEFAULT_CONTENTSTRING;

    /**
     * @var DnsType|null
     */
    protected $dnsType;

    /**
     * @var string|null
     */
    protected $dnsToResolve;

    /**
     * @var bool|null
     */
    protected $follow;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * @var string|null
     */
    protected $port;

    /**
     * @var string|null
     */
    protected $username;

    /**
     * @var string|null
     */
    protected $password;

    /**
     * @var string|null
     */
    protected $secure;

    /**
     * @var bool
     */
    protected $verify;
    protected $ignore;
    protected $invert;
    protected $warningDays;
    protected $fields;
    protected $postData;
    protected $data;
    protected $receiveHeaders;
    protected $sendHeaders;

    /**
     * @var Method|null
     */
    protected $method;
    protected $statusCode;

    public function __construct(CheckType $type)
    {
        $this->setType($type);
    }

    /**
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return static
     * @throws \InvalidArgumentException
     */
    public function setId($id)
    {
        if (null !== $id && !is_string($id)) {
            throw new InvalidArgumentTypeException('id', gettype($id));
        }
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param null|string $customerId
     *
     * @return static
     * @throws InvalidArgumentTypeException
     */
    public function setCustomerId($customerId)
    {
        if (null !== $customerId && !is_string($customerId)) {
            throw new InvalidArgumentTypeException('customerid', gettype($customerId));
        }
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param null|string $target
     *
     * @return static
     * @throws InvalidArgumentTypeException
     */
    public function setTarget($target)
    {
        if (null !== $target && !is_string($target)) {
            throw new InvalidArgumentTypeException('target', gettype($target));
        }
        $this->target = $target;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param null|string $label
     *
     * @return static
     * @throws InvalidArgumentTypeException
     */
    public function setLabel($label)
    {
        if (null !== $label && !is_string($label)) {
            throw new InvalidArgumentTypeException('label', gettype($label));
        }
        $this->label = $label;
        return $this;
    }

    /**
     * @param int $interval
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentMinValueException
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setInterval($interval)
    {
        if (null === $interval) {
            $interval = static::DEFAULT_INTERVAL;
        }

        if (!is_int($interval)) {
            throw new InvalidArgumentTypeException('interval', gettype($interval));
        }

        if ($interval < 1) {
            throw new InvalidArgumentMinValueException('interval', 1, $interval);
        }

        $this->interval = $interval;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setEnabled($enabled = true)
    {
        if (!is_bool($enabled)) {
            throw new InvalidArgumentTypeException('enabled', gettype($enabled));
        }
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * @param bool $public
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setPublic($public = true)
    {
        if (!is_bool($public)) {
            throw new InvalidArgumentTypeException('public', gettype($public));
        }
        $this->public = $public;
        return $this;
    }

    /**
     * @param RunLocation[] $runLocations
     *
     * @return static
     */
    public function setRunLocations(array $runLocations)
    {
        $this->runLocations = [];
        foreach ($runLocations as $location) {
            $this->addRunLocation($location);
        }
        return $this;
    }

    /**
     * @param RunLocation $runLocation
     *
     * @return static
     */
    public function addRunLocation(RunLocation $runLocation)
    {
        $this->runLocations[$runLocation->getCode()] = $runLocation;
        return $this;
    }

    /**
     * @return int
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * @param int $threshold
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentMinValueException
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setThreshold($threshold)
    {
        if (null === $threshold) {
            $threshold = static::DEFAULT_THRESHOLD;
        }

        if (!is_int($threshold)) {
            throw new InvalidArgumentTypeException('threshold', gettype($threshold));
        }

        if ($threshold < 1) {
            throw new InvalidArgumentMinValueException('threshold', 1, $threshold);
        }

        $this->threshold = $threshold;
        return $this;
    }

    /**
     * @return int
     */
    public function getSens()
    {
        return $this->sens;
    }

    /**
     * @param int $sens
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentMinValueException
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setSens($sens)
    {
        if (null === $sens) {
            $sens = static::DEFAULT_SENS;
        }

        if (!is_int($sens)) {
            throw new InvalidArgumentTypeException('sens', gettype($sens));
        }

        if ($sens < 1) {
            throw new InvalidArgumentMinValueException('sens', 1, $sens);
        }

        $this->sens = $sens;
        return $this;
    }

    /**
     * @return \Adv\Type\Notification[]
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * @param \Adv\Type\Notification[] $notifications
     *
     * @return static
     */
    public function setNotifications(array $notifications)
    {
        $this->notifications = [];
        foreach ($notifications as $notification) {
            $this->addNotification($notification);
        }
        return $this;
    }

    /**
     * @param \Adv\Type\Notification $notification
     *
     * @return static
     */
    public function addNotification(Notification $notification)
    {
        $this->notifications[spl_object_hash($notification)] = $notification;
        return $this;
    }

    /**
     * @return false|string
     */
    public function getDep()
    {
        return $this->dep;
    }

    /**
     * @param false|string $dep
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setDep($dep)
    {
        if ($dep !== false && !is_string($dep)) {
            throw new InvalidArgumentTypeException('dep', gettype($dep));
        }
        $this->dep = $dep;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentString()
    {
        return $this->contentString;
    }

    /**
     * @param string $contentString
     *
     * @return Check
     * @throws \InvalidArgumentException
     */
    public function setContentString($contentString)
    {
        if (null === $contentString) {
            $contentString = static::DEFAULT_CONTENTSTRING;
        }

        if (!is_string($contentString)) {
            throw new InvalidArgumentTypeException('contentstring', gettype($contentString));
        }

        if (!in_array($this->getType()->getCode(), [
            CheckType::DNS,
            CheckType::HTTPCONTENT,
            CheckType::HTTPADV,
            CheckType::FTP,
            CheckType::SSH,
            CheckType::WEBSOCKET,
        ], true)
        ) {
            throw new InvalidTypeException('contentstring', $this->getType()->getCode());
        }

        $this->contentString = $contentString;
        return $this;
    }

    /**
     * @return CheckType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param CheckType $type
     *
     * @return static
     * @throws \InvalidArgumentException
     */
    public function setType(CheckType $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \Adv\Checks\DnsType|null
     */
    public function getDnsType()
    {
        return $this->dnsType;
    }

    /**
     * @param DnsType|null $dnsType
     *
     * @return static
     * @throws \Adv\Exception\InvalidTypeException
     */
    public function setDnsType(DnsType $dnsType = null)
    {
        if ($this->getType()->getCode() !== CheckType::DNS) {
            throw new InvalidTypeException('dnstype', $this->getType()->getCode());
        }
        $this->dnsType = $dnsType;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDnsToResolve()
    {
        return $this->dnsToResolve;
    }

    /**
     * @param string $dnsToResolve
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     * @throws \Adv\Exception\InvalidTypeException
     */
    public function setDnsToResolve($dnsToResolve)
    {
        if ($this->getType()->getCode() !== CheckType::DNS) {
            throw new InvalidTypeException('dnstoresolve', $this->getType()->getCode());
        }
        if (!null === $dnsToResolve && !is_string($dnsToResolve)) {
            throw new InvalidArgumentTypeException('dnstoresolve', gettype($dnsToResolve));
        }
        $this->dnsToResolve = $dnsToResolve;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFollow()
    {
        return $this->follow;
    }

    /**
     * @param bool|null $follow
     *
     * @return static
     * @throws \InvalidArgumentException
     * @throws \Adv\Exception\InvalidTypeException
     */
    public function setFollow($follow)
    {
        if (!in_array($this->getType()->getCode(), [
            CheckType::HTTP,
            CheckType::HTTPCONTENT,
            CheckType::HTTPADV,
        ], true)
        ) {
            throw new InvalidTypeException('follow', $this->getType()->getCode());
        }

        if (null === $this->getMethod()) {
            throw new \InvalidArgumentException('You should set type first');
        }

        if ($this->getType()->getCode() === CheckType::HTTPADV && $this->getMethod()->getCode() !== Method::GET) {
            throw new \InvalidArgumentException(sprintf(
                'Cant use follow for %s type and %s method',
                $this->getType()->getCode(),
                $this->getMethod()->getCode()
            ));
        }
        $this->follow = $follow;
        return $this;
    }

    /**
     * @return \Adv\Type\Method|null
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param \Adv\Type\Method|null $method
     *
     * @return static
     * @throws \InvalidArgumentException
     */
    public function setMethod(Method $method = null)
    {
        if (null !== $method && $this->getFollow() && $method->getCode() === Method::GET) {
            throw new \InvalidArgumentException(sprintf(
                'Cant use method %s for %s type and follow',
                $method->getCode(),
                $this->getType()->getCode()
            ));
        }

        $this->method = $method;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     *
     * @return static
     * @throws \Adv\Exception\InvalidTypeException
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setEmail($email)
    {
        if (null !== $email && !is_string($email)) {
            throw new InvalidArgumentTypeException('email', gettype($email));
        }

        if (!in_array($this->getType()->getCode(), [
            CheckType::IMAP4,
            CheckType::SMTP,
        ], true)
        ) {
            throw new InvalidTypeException('contentstring', $this->getType()->getCode());
        }
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param null|int $port
     *
     * @return static
     * @throws \Adv\Exception\InvalidTypeException
     * @throws \InvalidArgumentException
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setPort($port)
    {
        if (null !== $port && !is_int($port)) {
            throw new InvalidArgumentTypeException('port', gettype($port));
        }

        if (null === $port && in_array($this->getType()->getCode(), [
                CheckType::PORT,
                CheckType::NTP,
            ], true)
        ) {
            throw new \InvalidArgumentException(sprintf(
                'For %s type port must be setted',
                $this->getType()->getCode()
            ));
        } elseif (null !== $port && !in_array($this->getType()->getCode(), [
                CheckType::DNS,
                CheckType::FTP,
                CheckType::SSH,
            ], true)
        ) {
            throw new InvalidTypeException('port', $this->getType()->getCode());
        }

        $this->port = $port;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param null|string $username
     *
     * @return static
     * @throws \Adv\Exception\InvalidTypeException
     */
    public function setUsername($username)
    {
        if (null !== $username && !in_array($this->getType()->getCode(), [
                CheckType::FTP,
                CheckType::IMAP4,
                CheckType::POP3,
                CheckType::SMTP,
                CheckType::SSH,
            ], true)
        ) {
            throw new InvalidTypeException('username', $this->getType()->getCode());
        }

        $this->username = $username;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null|string $password
     *
     * @return Check
     * @throws \Adv\Exception\InvalidTypeException
     */
    public function setPassword($password)
    {
        if (null !== $password && !in_array($this->getType()->getCode(), [
                CheckType::FTP,
                CheckType::IMAP4,
                CheckType::POP3,
                CheckType::SMTP,
                CheckType::SSH,
            ], true)
        ) {
            throw new InvalidTypeException('password', $this->getType()->getCode());
        }

        $this->password = $password;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * @param string|null $secure
     *
     * @return static
     * @throws \Adv\Exception\InvalidTypeException
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setSecure($secure = 'ssl')
    {
        if ($secure !== null && !is_string($secure)) {
            throw new InvalidArgumentTypeException('secure', $secure);
        }

        if (is_string($secure) && !in_array($this->getType()->getCode(), [
                CheckType::IMAP4,
                CheckType::SMTP,
                CheckType::POP3,
            ], true)
        ) {
            throw new InvalidTypeException('secure', $this->getType()->getCode());
        }

        $this->secure = $secure;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVerify()
    {
        return $this->verify;
    }

    /**
     * @param bool $verify
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setVerify($verify = true)
    {
        if (!is_bool($verify)) {
            throw new InvalidArgumentTypeException('verify', gettype($verify));
        }
        $this->verify = $verify;
        return $this;
    }


}