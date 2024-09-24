<?php

 class BSTNode {
    public $data;
    public $left;
    public $right;

    public function __construct($_data) {
        $this->data = $_data;
        $this->left = null;
        $this->right = null;
    }
}