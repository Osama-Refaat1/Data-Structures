<?php
include './KeyValuePair.php';

 class Dictionary 
{
 

 private KeyValuePair $entries;
private int $entriesCount;
public function __construct()
{
$this->entries =new KeyValuePair();
$this->entriesCount = 0;
}



}//end of Dictionary class
