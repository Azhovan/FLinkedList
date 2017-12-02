<?php


use trip\Node;

abstract class AbstractList implements Countable
{
    /** @var  int */
    protected $count;

    /**
     * size of list
     *
     * @return int
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * add new node to list and sort it
     *
     * @param Node $node
     * @return void
     */
    protected abstract function add(Node $node): void;


}