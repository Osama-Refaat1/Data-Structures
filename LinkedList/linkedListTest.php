<?php
include 'linkedList.php';

$ll = new LinkedList();
$ll->insertAtBeginning(1);
$ll->insertAtBeginning(2);
$ll->insertAtBeginning(3);
$ll->insertAtBeginning(4);
// $ll->insertAtEnd(5);
$ll->insertAfter(3 , 33);
// $ll->traverse();
$ll->deleteNode(33);
$ll->traverse();
