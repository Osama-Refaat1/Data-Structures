<?php
include 'node.php';
class LinkedList
{
    private ?Node $head;
    private ?Node $tail;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }
    public function insertAtBeginning($data)
    {
        $newNode = new Node($data);
        if($this->head == null && $this->tail == null)
        {
            
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }
            $newNode->next = $this->head;
            $this->head = $newNode;
        
    }


    public function insertAtEnd($data)
    {
        $newNode = new Node($data);
        if($this->head == null && $this->tail == null)
        {
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }
        else
        {
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
        
    }

    public function search($data)
    {
        $current = $this->head;
        while($current != null)
        {
            if($current->data === $data)
            {
                return $current;
            }
            $current = $current->next;
        }
        echo "Data not found";
        return null;
    }
public function insertAfter($existingData , $newData)
{
    $existingNode = $this->search($existingData);
    if($existingNode == null)
    {
throw new exception("The node to insert after is not found");
    }

    $newNode = new Node($newData);
    $newNode->next = $existingNode->next;
    $existingNode->next = $newNode;
if($existingNode === $this->tail)
{
    $this->tail = $newNode;


}
}


public function deleteFromBeginning()
{
    if($this->head == null)
    {
        throw new exception("The list is empty");
    }
    $this->head = $this->head->next;
    if($this->head == null)
    {
        $this->tail = null;
    }
}


public function deleteFromEnd()
{
    if($this->head == null)
    {
        throw new exception("The list is empty");
    }
    if($this->head === $this->tail)
    {
        $this->head = null;
        $this->tail = null;
        return;
    }
    $current = $this->head;
    while($current->next !== $this->tail)
    {
        $current = $current->next;
    }
    $current->next = null;
    $this->tail = $current;
}


public function deleteNode($data)
{
    if($this->head == null)
    {
        throw new exception("The list is empty");
    }
    if($this->head->data === $data)
    {
        $this->deleteFromBeginning();
        return;
    }
    if($this->tail->data === $data)
    {
        $this->deleteFromEnd();
        return;
    }
    $current = $this->head;
    while($current->next !== null)
    {
        if($current->next->data === $data)
        {
            $current->next = $current->next->next;
if($current->next === null)
{
    $this->tail = $current;
}

            return;
        }
        $current = $current->next;
    }
    throw new exception("Data not found");
}


public function traverse()
{
    $current = $this->head;
    while($current != null)
    {
        echo $current->data . "->";
        $current = $current->next;
    }
}

}//class