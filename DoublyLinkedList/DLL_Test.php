<?php 
// Include the class
include 'DLL.php';

 $doubleLinkedList= new DLL();

    $doubleLinkedList->insertAtEnd(10);
    $doubleLinkedList->insertAtEnd(20);
    $doubleLinkedList->insertAtEnd(30);
    // $doubleLinkedList->insertAfter(20, 40);
    // $doubleLinkedList->traverse();
    $doubleLinkedList->deleteNode(20);
    $doubleLinkedList->traverse();