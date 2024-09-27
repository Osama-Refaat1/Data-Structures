<?php

require_once './heap.php';

$heap = new heap();

$heap->insertMin(24);
$heap->insertMin(32);
$heap->insertMin(16);
$heap->insertMin(45);
$heap->insertMin(20);
$heap->insertMin(53);
$heap->insertMin(14);
$heap->insertMin(27);

$heap->print();
echo "----------------------------------------\n";

echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
echo $heap->pop() . "\n";
