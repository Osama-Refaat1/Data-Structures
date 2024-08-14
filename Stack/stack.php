<?php

class Stack
{
    private int $top;
    private int $count;
    private array $items;


   public function __construct()
    {
        $this->top = -1;
        $this->count = 0;
        $this->items = [];
    }

    public function isEmpty(): bool
    {
        return $this->count === 0;
    }
    

  public function push($item)
   {
    $this->top++;
    $this->items[$this->top] = $item;
    $this->count++;
   }
  
    
    
    
    public function pop()
{
if($this->isEmpty()) {
    throw new RuntimeException("Stack is already empty");
}
else {
    $item = $this->items[$this->top];
    $this->top--;
    $this->count--;
    return $item;
}
}
public function peek()
{
    if($this->isEmpty()) {
        throw new RuntimeException("Stack is already empty");
    }
    else {
        return $this->items[$this->top];
    }    
}
public function size()
{
    return $this->count;
}
public function display(){
if ($this->isEmpty()) {
    throw new RuntimeException("Stack is empty");
}

foreach ($this->items as $item) {
    echo $item . PHP_EOL;
}
}

}