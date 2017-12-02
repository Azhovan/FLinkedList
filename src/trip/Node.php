<?php


namespace trip;

class Node
{
    /** @var  array */
    private $data;

    /** @var  Node */
    private $next;


    /**
     * Node constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;

        $this->next = null;
    }


    /**
     * dynamically get data
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        }

        return null;
    }


    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }


    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        $method = strtolower($method);
        $attribute = substr($method, 3);

        if (strstr($method, 'get')) {
            return $this->data[$attribute];

        } elseif (strstr($method, 'set')) {
            $this->data[$attribute] = $args;
        }
    }


    /**
     * @param Node $next
     * @return Node
     */
    public function next(Node $next = null)
    {
        if (null == $next)
            return $this->next;

        $this->next = $next;
    }

    /**
     * @return Node
     */
    public function node() : Node
    {
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }




}
