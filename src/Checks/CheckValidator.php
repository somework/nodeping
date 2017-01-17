<?php


namespace Adv\Checks;


use Adv\Exception\InvalidArgumentTypeException;
use Adv\Type\Method;
use Adv\Type\Notification;
use Adv\Type\RunLocation;

class CheckValidator
{
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
    protected $interval;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var string
     */
    protected $public;

    /**
     * @var RunLocation[]
     */
    protected $runLocations = [];

    /**
     * @var int
     */
    protected $threshold;

    /**
     * @var int
     */
    protected $sens;

    /**
     * @var Notification[]
     */
    protected $notifications;

    /**
     * @var string|null
     */
    protected $dep;

    /**
     * @var string|null
     */
    protected $contentString;

    /**
     * @var string|null
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

    /**
     * @var string|null
     */
    protected $ignore;

    /**
     * @var string
     */
    protected $invert;

    /**
     * @var int
     */
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

    public function __construct($type)
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
        $this->interval = $interval;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param string $enabled
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setEnabled($enabled = 'true')
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * @param string $public
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setPublic($public = 'true')
    {
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
     * @return string|null
     */
    public function getDep()
    {
        return $this->dep;
    }

    /**
     * @param null|string $dep
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setDep($dep)
    {
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
     * @return static
     * @throws \InvalidArgumentException
     */
    public function setContentString($contentString)
    {
        $this->contentString = $contentString;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return static
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getDnsType()
    {
        return $this->dnsType;
    }

    /**
     * @param string $dnsType
     *
     * @return static
     * @throws \Adv\Exception\InvalidTypeException
     */
    public function setDnsType($dnsType)
    {
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
     * @return static
     * @throws \Adv\Exception\InvalidTypeException
     */
    public function setPassword($password)
    {
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
        $this->verify = $verify;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIgnore()
    {
        return $this->ignore;
    }

    /**
     * @param mixed $ignore
     *
     * @return static
     */
    public function setIgnore($ignore)
    {
        $this->ignore = $ignore;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvert()
    {
        return $this->invert;
    }

    /**
     * @param string $invert
     *
     * @return static
     */
    public function setInvert($invert)
    {
        $this->invert = $invert;
        return $this;
    }

    /**
     * @return int
     */
    public function getWarningDays()
    {
        return $this->warningDays;
    }

    /**
     * @param int $warningDays
     *
     * @return static
     */
    public function setWarningDays($warningDays)
    {
        $this->warningDays = $warningDays;
        return $this;
    }


}