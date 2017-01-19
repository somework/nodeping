<?php


namespace Adv\Nodeping\Checks\Fields;


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
     */
    public function setContactId($contactId)
    {
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
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * @return int
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param int $delay
     *
     * @return static
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
        return $this;
    }
}