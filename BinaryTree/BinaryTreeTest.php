<?php 
require_once 'BinaryTree.php';




$tree = new BinaryTree();
$tree->insert('A');
$tree->insert('B');
$tree->insert('C');
$tree->insert('D');
$tree->insert('E');
$tree->insert('F');
$tree->insert('G');
$tree->insert('H');
$tree->insert('I');


// $tree->print();
$tree->delete('F');
$tree->print();


