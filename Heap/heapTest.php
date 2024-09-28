<?php

require_once './heap.php';

$queue = new PQ();

$queue->enqueue(24);
$queue->enqueue(32);
$queue->enqueue(16);
$queue->enqueue(45);
$queue->enqueue(20);
$queue->enqueue(53);
$queue->enqueue(14);
$queue->enqueue(27);

$queue->print();
echo "----------------------------------------\n";

echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
echo $queue->dequeue() . "\n";
