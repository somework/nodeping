<?php
/**
 * Created by PhpStorm.
 * User: pinchuk
 * Date: 1/18/17
 * Time: 10:30 AM
 */

namespace Adv\Nodeping\Checks\Fields;


class Field
{
    protected $name;
    protected $min;
    protected $max;
    /**
     * @var null|string
     */
    protected $code;

    /**
     * HttpadvField constructor.
     *
     * @param             $name
     * @param             $min
     * @param             $max
     * @param null|string $code
     */
    public function __construct($name, $min, $max, $code = null)
    {
        $this
            ->setName($name)
            ->setMin($min)
            ->setMax($max)
            ->setCode($code);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return static
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param mixed $min
     *
     * @return static
     */
    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     *
     * @return static
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param mixed $max
     *
     * @return static
     */
    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }
}