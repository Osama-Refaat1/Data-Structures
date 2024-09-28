<?php 
class PQ
{
    private $list;
    private $size;

public function __construct() {
    $this->list = [];
    $this->size = 0;
}

public function enqueue(mixed $_priority, mixed $_data): void {
    $i = $this->size++;
    $this->list[$i] = ['priority' => $_priority, 'data' => $_data];

    $pIndex = floor(($i - 1) / 2);
    while ($i != 0 && $this->list[$i]['priority'] < $this->list[$pIndex]['priority']) {
        
        $temp = $this->list[$i];
        $this->list[$i] = $this->list[$pIndex];
        $this->list[$pIndex] = $temp;

        $i = $pIndex;
        $pIndex = floor(($i - 1) / 2);
    }
    return;
}


public function dequeue(): mixed {
    if ($this->size == 0) {
        return "Queue is empty";
    }

    $i = 0;
    // Save the data and priority of the root (minimum element)
    $data = $this->list[$i]['data'];
    $priority = $this->list[$i]['priority'];

    // Move the last element to the root
    $this->list[$i] = $this->list[$this->size - 1];
    unset($this->list[$this->size - 1]); // Remove the last element
    $this->size--;

    // Reheapify (bubble down) to maintain the min-heap property
    $leftIndex = 2 * $i + 1;
    while ($leftIndex < $this->size) {
        $rightIndex = 2 * $i + 2;
        $smallestIndex = $leftIndex;

        // Check if the right child exists and has a smaller priority than the left child
        if (isset($this->list[$rightIndex]) && $this->list[$rightIndex]['priority'] < $this->list[$leftIndex]['priority']) {
            $smallestIndex = $rightIndex;
        }

        // If the current element is smaller than the smallest child, we're done
        if ($this->list[$i]['priority'] < $this->list[$smallestIndex]['priority']) {
            break;
        }

        // Swap the current element with the smallest child
        $temp = $this->list[$i];
        $this->list[$i] = $this->list[$smallestIndex];
        $this->list[$smallestIndex] = $temp;

        // Move down to the smallest child
        $i = $smallestIndex;
        $leftIndex = 2 * $i + 1;
    }

    return ['priority' => $priority, 'data' => $data];
}


public function print(): void {
        $printData = "";
        for($i = 0; $i < $this->size; $i++) {
            $printData .= $this->list[$i]['data'] . " ";
        }
        echo $printData . "\n";
}








}// end of class