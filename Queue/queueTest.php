<?php
include './queue.php';

$queue = new Queue();

$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
$queue->enqueue(4);
$queue->print();