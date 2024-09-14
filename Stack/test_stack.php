<?php

require 'stack.php';


$stack = new Stack();

$stack->push("First");
$stack->push("first");


echo "Peek: " . $stack->peek() . PHP_EOL;

echo "Size: " . $stack->size() . PHP_EOL;

echo "Stack contents:" . PHP_EOL;
$stack->display();

echo "Popped: " . $stack->pop() . PHP_EOL;

echo "Size after pop: " . $stack->size() . PHP_EOL;

echo "Stack contents after pop:" . PHP_EOL;
$stack->display();