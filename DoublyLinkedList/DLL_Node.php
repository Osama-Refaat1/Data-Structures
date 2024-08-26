<?php

class DLL_Node
{
    public mixed $data;
    public ?DLL_Node $next;
    public ?DLL_Node $prev;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}