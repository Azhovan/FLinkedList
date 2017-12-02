<?php

namespace trip;

use AbstractList;

class NodeList extends AbstractList
{

    /** @var  Node */
    private $head = null;

    /** @var  Node */
    private $current = null;


    /**
     * add new node to list and sort it
     *
     * @param Node $newNode
     * @return void
     */
    public function add(Node $newNode): void
    {

        if (null == $this->head || $this->head->getFrom() == $newNode->getTo()) {

            $newNode->next($this->head);
            $this->head = $newNode;

        } else {
            $this->current = $this->head;

            while (null != $this->current->next()
                && $this->current->next()->getTo() == $newNode->getFrom()) {
                $this->current = $this->current->next();
            }

            $newNode->next($this->current->next());
            $this->current->next($newNode);
        }

        $this->count ++;
    }


    public function print()
    {
        $tmp = $this->head;

        while ($tmp != null) {
            echo $tmp->getFrom() . " >> " . $tmp->getTo() . PHP_EOL;
            $tmp = $tmp->next();
        }
    }


}