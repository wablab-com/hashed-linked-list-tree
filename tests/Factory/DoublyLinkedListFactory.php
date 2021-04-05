<?php

namespace WabLab\Tests\Factory;

use WabLab\DoublyLinkedList\Contract\IDLNode;
use WabLab\DoublyLinkedList\DLNode;
use WabLab\DoublyLinkedList\Helpers\LinkingNodes;
use WabLab\DoublyLinkedList\Helpers\SettingNodeAfter;


class DoublyLinkedListFactory
{
    public static function createChain(int $length = 10, ?IDLNode &$firstNode = null, ?IDLNode &$lastNode = null):IDLNode
    {
        $root = null;
        $prevNode = null;
        for($i=1; $i <= $length; $i++) {
            $node = new DLNode();
            $node->setPayload($i);
            if(!$root) {
                $root = $node;
            }
            if($prevNode) {
                SettingNodeAfter::process($prevNode, $node);
            }
            $prevNode = $node;
        }
        $firstNode = $root;
        $lastNode = $node;
        return $root;
    }

}
