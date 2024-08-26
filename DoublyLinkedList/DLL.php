<?php
include 'DLL_Node.php';
class DLL
{
    private ?DLL_Node $head;
    private ?DLL_Node $tail;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }
    public function insertAtBeginning($data)
    {
        $newNode = new DLL_Node($data);
        if($this->head == null && $this->tail == null)
        {
            
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        
    }


    public function insertAtEnd($data)
    {
        $newNode = new DLL_Node($data);
        if($this->head == null && $this->tail == null)
        {
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }
        else
        {
            $this->tail->next = $newNode;
            $newNode->prev = $this->tail;
            $this->tail = $newNode;
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