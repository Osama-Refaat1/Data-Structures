<?php
require_once 'Dictionary.php';  
require_once 'KeyValuePair.php'; 


$dictionary = new Dictionary();

$dictionary->add(1, 10);
$dictionary->add(2, 20);
$dictionary->add(3, 30);

$dictionary->print();


