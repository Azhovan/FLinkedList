<?php

namespace trip\test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use PHPUnit\Framework\TestCase;
use trip\Node;


class NodeTest extends TestCase
{

    public function setUp()
    {

    }

    public function tearDown()
    {

    }

    public function testData()
    {
        $data = array(
            'from' => 'from',
            'to' => 'to'
        );
        $node = new Node($data);
        $this->assertEquals(
            $data,
            $node->node()->getData(),
            "cannot fetch node data"
        );
    }

    public function testDataStructure()
    {
        $data = array(
            'from' => 'from',
            'to' => 'to'
        );
        $node = new Node($data);
        $this->assertEquals(
            $data['from'],
            $node->node()->getFrom(),
            "cannot get attribute from in the node structure"
        );
        $this->assertEquals(
            $data['to'],
            $node->node()->getTo(),
            "cannot get attribute from in the node structure"
        );
    }

    public function testNext()
    {
        $data1 = array(
            'from' => 'from1',
            'to' => 'to1'
        );
        $node1 = new Node($data1);

        $data2 = array(
            'from' => 'from2',
            'to' => 'to2'
        );
        $node2 = new Node($data2);

        $node1->next($node2);

        $this->assertEquals(
            $node2,
            $node1->next(),
            "cannot set next node"
        );
    }

    public function testChangeNextPointerWithAnotherNode()
    {
        $data1 = array(
            'from' => 'from1',
            'to' => 'to1'
        );
        $node1 = new Node($data1);

        $data2 = array(
            'from' => 'from2',
            'to' => 'to2'
        );
        $node2 = new Node($data2);

        $data3 = array(
            'from' => 'from2',
            'to' => 'to2'
        );
        $node3 = new Node($data3);

        $node1->next($node2);
        $node1->next($node3);

        $this->assertEquals(
            $node3,
            $node1->next(),
            "cannot change the pointer"
        );
    }





}