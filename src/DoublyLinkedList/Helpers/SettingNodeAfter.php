<?php

namespace WabLab\DoublyLinkedList\Helpers;

use WabLab\DoublyLinkedList\Contract\IDLNode;

class SettingNodeAfter
{

    public static function process(IDLNode $afterNode, IDLNode $nodeToSet): void
    {
        if($afterNode !== $nodeToSet) {
            FreeingNode::process($nodeToSet);
            $connectedNodeRight = $afterNode->getRight();
            $nodeToSet->setLeft($afterNode);
            $nodeToSet->setRight($connectedNodeRight);
            $afterNode->setRight($nodeToSet);
            if($connectedNodeRight)
                $connectedNodeRight->setLeft($nodeToSet);
        }
    }

}
