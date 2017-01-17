<?php


namespace Adv\Type;


use Adv\Exception\InvalidArgumentTypeException;

class Notification
{
    /**
     * @var string
     */
    protected $contactId;

    /**
     * @var string
     */
    protected $schedule;

    /**
     * @var string
     */
    protected $delay;

    public function __construct($contactId, $schedule, $delay = 0)
    {
        $this
            ->setContactId($contactId)
            ->setSchedule($schedule)
            ->setDelay($delay);
    }

    /**
     * @return string
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @param string $contactId
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setContactId($contactId)
    {
        if (!is_string($contactId)) {
            throw new InvalidArgumentTypeException('contactid', gettype($contactId));
        }
        $this->contactId = $contactId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param string $schedule
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setSchedule($schedule)
    {
        if (!is_string($schedule)) {
            throw new InvalidArgumentTypeException('schedule', gettype($schedule));
        }
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * @return string
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param string $delay
     *
     * @return static
     * @throws \Adv\Exception\InvalidArgumentTypeException
     */
    public function setDelay($delay)
    {
        if (!is_string($delay)) {
            throw new InvalidArgumentTypeException('delay', gettype($delay));
        }
        $this->delay = $delay;
        return $this;
    }
}