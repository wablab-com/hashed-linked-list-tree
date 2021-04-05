<?php

namespace WabLab\DoublyLinkedList\Helpers;

use WabLab\DoublyLinkedList\Contract\IDLNode;

class SettingNodeBefore
{

    public static function process(IDLNode $nodeToSet, IDLNode $beforeNode): void
    {
        if($beforeNode !== $nodeToSet) {
            FreeingNode::process($nodeToSet);
            $connectedNodeLeft = $beforeNode->getLeft();
            $nodeToSet->setLeft($connectedNodeLeft);
            $nodeToSet->setRight($beforeNode);
            $beforeNode->setLeft($nodeToSet);
            if($connectedNodeLeft)
                $connectedNodeLeft->setRight($nodeToSet);
        }
    }

}
