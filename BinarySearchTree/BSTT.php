<?php 
require 'BSTree.php';
 

$tree = new BSTree();
$tree->BSInsert(1);
$tree->BSInsert(2);
$tree->BSInsert(3);
$tree->BSInsert(4);
$tree->BSInsert(5);
$tree->BSInsert(6);
$tree->BSInsert(7);

// $tree->BSPrintUsingBFS();

$tree->balance();

$tree->BSPrintUsingBFS();


