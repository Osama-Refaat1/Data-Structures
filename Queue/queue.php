<?php

include '../DoublyLinkedList/DLL.php'; 
class Queue
{
 private DLL $items;

 public function __construct()
 {
 $this->items = new DLL();   
 }


public function enqueue($item): void
{
        $this->items->insertAtEnd($item);
}

public function dequeue()
{
return $this->items->deleteFromBeginning();
}



public function peek(): mixed
{
return $this->items->getFirst();
}



public function isEmpty(): bool
{
    if($this->items->getSize() == 0)
    {
        return true;
    }
    return false;
}




public function size(): int
{
    return $this->items->getSize();
}

public function print()
{
    if ($this->isEmpty()) 
    {
        echo "Queue is empty\n";
        return;
    }

    $this->items->traverse(function($data)
    {
        echo $data . " -> ";
    });
}







} //class end