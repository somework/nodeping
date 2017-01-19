<?php


namespace Adv\Nodeping\Checks;


use Adv\Nodeping\Checks\Fields\Field;
use Adv\Nodeping\Checks\Fields\Notification;

class Check
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $customerId;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var string
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
     * @var array
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
     * @var string
     */
    protected $dep;

    /**
     * @var string
     */
    protected $contentString;

    /**
     * @var string
     */
    protected $dnsType;

    /**
     * @var string
     */
    protected $dnsToResolve;

    /**
     * @var bool
     */
    protected $follow;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $port;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $secure;

    /**
     * @var string
     */
    protected $verify;

    /**
     * @var string
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

    /**
     * @var Field[]
     */
    protected $fields;

    /**
     * @var string
     */
    protected $postData;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $receiveHeaders = [];

    /**
     * @var array
     */
    protected $sendHeaders;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var int
     */
    protected $statusCode;

    public function __construct($type)
    {
        $this->setType($type);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return static
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param string $customerId
     *
     * @return static
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     *
     * @return static
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return static
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
     */
    public function setPublic($public = 'true')
    {
        $this->public = $public;
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
     */
    public function setSens($sens)
    {
        $this->sens = $sens;
        return $this;
    }

    /**
     * @return \Adv\Nodeping\Checks\Fields\Notification[]
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * @param \Adv\Nodeping\Checks\Fields\Notification[] $notifications
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
     * @param \Adv\Nodeping\Checks\Fields\Notification $notification
     *
     * @return static
     */
    public function addNotification(Notification $notification)
    {
        $this->notifications[spl_object_hash($notification)] = $notification;
        return $this;
    }

    /**
     * @return string
     */
    public function getDep()
    {
        return $this->dep;
    }

    /**
     * @param string $dep
     *
     * @return static
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
     */
    public function setDnsType($dnsType)
    {
        $this->dnsType = $dnsType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDnsToResolve()
    {
        return $this->dnsToResolve;
    }

    /**
     * @param string $dnsToResolve
     *
     * @return static
     */
    public function setDnsToResolve($dnsToResolve)
    {
        $this->dnsToResolve = $dnsToResolve;
        return $this;
    }

    /**
     * @return bool
     */
    public function getFollow()
    {
        return $this->follow;
    }

    /**
     * @param bool $follow
     *
     * @return static
     */
    public function setFollow($follow)
    {
        $this->follow = $follow;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return static
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return static
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     *
     * @return static
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return static
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return static
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * @param string $secure
     *
     * @return static
     */
    public function setSecure($secure = 'ssl')
    {
        $this->secure = $secure;
        return $this;
    }

    /**
     * @return string
     */
    public function getVerify()
    {
        return $this->verify;
    }

    /**
     * @param bool $verify
     *
     * @return string
     */
    public function setVerify($verify = true)
    {
        $this->verify = $verify;
        return $this;
    }

    /**
     * @return string
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

    /**
     * @param \Adv\Nodeping\Checks\Fields\Field $field
     *
     * @return static
     */
    public function addField(Field $field)
    {
        $this->fields[spl_object_hash($field)] = $field;
        return $this;
    }

    /**
     * @return \Adv\Nodeping\Checks\Fields\Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param \Adv\Nodeping\Checks\Fields\Field[] $fields
     *
     * @return static
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return static
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostData()
    {
        return $this->postData;
    }

    /**
     * @param string $postData
     *
     * @return static
     */
    public function setPostData($postData)
    {
        $this->postData = $postData;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return static
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getReceiveHeaders()
    {
        return $this->receiveHeaders;
    }

    /**
     * @param array $receiveHeaders
     *
     * @return static
     */
    public function setReceiveHeaders(array $receiveHeaders)
    {
        $this->receiveHeaders = $receiveHeaders;
        return $this;
    }

    /**
     * @param int|string $key
     * @param mixed      $value
     *
     * @return static
     */
    public function addReceiveHeader($key, $value)
    {
        $this->receiveHeaders[$key] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getSendHeaders()
    {
        return $this->sendHeaders;
    }

    /**
     * @param array $sendHeaders
     *
     * @return static
     */
    public function setSendHeaders(array $sendHeaders)
    {
        $this->sendHeaders = $sendHeaders;
        return $this;
    }

    /**
     * @param int|string $key
     * @param mixed      $value
     *
     * @return static
     */
    public function addSendHeader($key, $value)
    {
        $this->sendHeaders[$key] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getRunLocations()
    {
        return $this->runLocations;
    }

    /**
     * @param array $runLocations
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
     * @param string $runLocation
     *
     * @return static
     */
    public function addRunLocation($runLocation)
    {
        $this->runLocations[$runLocation] = $runLocation;
        return $this;
    }


}