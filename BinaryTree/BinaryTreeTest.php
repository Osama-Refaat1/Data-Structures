<?php 
require_once 'BinaryTree.php';




$tree = new BinaryTree();
$tree->insert(1);
$tree->insert(2);
$tree->insert(3);
$tree->insert(4);
$tree->insert(5);
$tree->insert(6);
$tree->insert(7);




echo "Binary Tree (Level-Order Traversal):\n";
$tree->print();