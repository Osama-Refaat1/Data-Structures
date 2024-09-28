<?php 
require_once 'PQ.php';

$queue = new PQ();

$queue->enqueue(5, 24);
$queue->enqueue(5, 32);
$queue->enqueue(3, 16);
$queue->enqueue(3, 45);
$queue->enqueue(1, 20);
$queue->enqueue(1, 53);
$queue->enqueue(2, 14);
$queue->enqueue(2, 27);

// $queue->print();
echo "----------------------------------------\n";

$queue->dequeue();
$queue->print();

