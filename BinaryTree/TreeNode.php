<?php
class TreeNode
{
    public mixed $data;
    public ?TreeNode $left;
    public ?TreeNode $right;

    public function __construct(mixed $_data)
    {
        $this->data = $_data;
        $this->left = null;
        $this->right = null;
    }

}
