<?php
include 'DLL_Node.php';
class DLL
{
    private ?DLL_Node $head;
    private ?DLL_Node $tail;
    private int $size;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }
    public function insertAtBeginning($data)
    {
        $newNode = new DLL_Node($data);
        if($this->head == null && $this->tail == null)
        {
            
            $this->head = $newNode;
            $this->tail = $newNode;
            $this->size++;
            return;
        }
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
            $this->size++;
        
    }


    public function insertAtEnd($data)
    {
        $newNode = new DLL_Node($data);
        if($this->head == null && $this->tail == null)
        {
            $this->head = $newNode;
            $this->tail = $newNode;
            $this->size++;
            return;
        }
        else
        {
            $this->tail->next = $newNode;
            $newNode->prev = $this->tail;
            $this->tail = $newNode;
            $this->size++;
        }
        
    }

    public function search($data)
    {
        $current = $this->head;
        while($current != null)
        {
            if($current->data == $data)
            {
                return $current;
            }
            $current = $current->next;
        }
        echo "Data not found";
        return;
    }


public function insertAfter($existingData , $newData)
{
    $existingNode = $this->search($existingData);
    if($existingNode == null)
    {
        throw new exception("The node to insert after is not found");
    }

    $newNode = new DLL_Node($newData);

    $newNode->next = $existingNode->next;
    $newNode->prev = $existingNode;
    $existingNode->next = $newNode;
    if($newNode->next != null)
    {
        $newNode->next->prev = $newNode;
    } 
    else
    {
        $this->tail = $newNode;
    }
    $this->size++;
    
}

public function getFirst(): mixed
{
    return $this->head->data;
}


public function deleteFromBeginning()
{
    if($this->head == null)
    {
        throw new exception("The list is empty");
    }
    $this->head->next->prev = null;
    $this->head = $this->head->next;
    if($this->head == null)
    {
        $this->tail = null;
    }
    $this->size--;
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
        $this->size--;
        return;
    }
    $current = $this->head;
    while($current->next !== $this->tail)
    {
        $current = $current->next;
    }
    $current->next = null;
    $this->tail = $current;
    $this->size--;
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
    while($current->data !== $data)
    {
        $current = $current->next;
        if($current == null)
        {
            throw new exception("The node to delete is not found");
        }
    }
    $current->prev->next = $current->next;
    $current->next->prev = $current;
    if($current === $this->tail)
    {
        $this->tail = $current->prev;
    }
    $this->size--;
}

public function getSize() : int
{
    return $this->size;
}


public function traverse(callable $callback)
{
    $current = $this->head;
    while($current != null)
    {
       $callback($current->data);
        $current = $current->next;
    }
}

}//class