<?php 

class Heap
{
    private $list;
    private $size;

    public function __construct() {
        $this->list = [];
        $this->size = 0;
    }

    public function print(): void {
        $printData = "";
        for($i = 0; $i < $this->size; $i++) {
            $printData .= $this->list[$i] . " ";
        }
        echo $printData . "\n";
    }

public function size(): int {
    return $this->size;
}

public function insertMin(mixed $_data): void {
 $i = $this->size++;
 $this->list[$i] = $_data;
$pIndex =  floor( ($i - 1) /2 );
 
while($i != 0 && $this->list[$i] < $this->list[$pIndex]) {
$this->list[$i] = $this->list[$pIndex];
$this->list[$pIndex] = $_data; 
$i = $pIndex;
$pIndex = floor( ($i - 1) /2 );
}
return;
}

public function insertMax(mixed $_data): void {
    $i = $this->size++;
    $this->list[$i] = $_data;
    $pIndex = floor( ($i - 1) /2 );
   
    while($i != 0 && $this->list[$i] > $this->list[$pIndex]) {
   $this->list[$i] = $this->list[$pIndex];
   $this->list[$pIndex] = $_data; 
   $i = $pIndex;
   $pIndex = floor( ($i - 1) /2 );
   }
   return;
}


public function pop() : mixed {
    if($this->size == 0) return "Heap is empty";
    $i = 0;
    $value = $this->list[$i];
    $this->list[$i] = $this->list[$this->size - 1];
    $this->list[$this->size - 1] = null;
    $this->size--;

    $leftIndex = 2 * $i + 1;
    while($leftIndex < $this->size) {
        $rightIndex = 2* $i + 2;
        
        if($this->list[$rightIndex] != null &&
         $this->list[$rightIndex] < $this->list[$leftIndex]) {
            $smallestIndex = $rightIndex;
        } else {
            $smallestIndex = $leftIndex;
        }

        if($this->list[$i] < $this->list[$smallestIndex]) {
            break;
        }

        $temp = $this->list[$i];
        $this->list[$i] = $this->list[$smallestIndex];
        $this->list[$smallestIndex] = $temp;
        $i = $smallestIndex;
        $leftIndex = 2 * $i + 1;
    }
    
    return $value;
}

}// end of class