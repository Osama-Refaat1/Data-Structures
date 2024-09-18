<?php
require_once 'TreeNode.php';
require_once '../Queue/queue.php';

class BinaryTree {
    private $root;

    public function __construct() {
        $this->root = null;
    }


  public function insert($value) 
  {
        $newNode = new TreeNode($value);

        if ($this->root === null) {
            $this->root = $newNode;
            return;
        }

        $queue = new Queue();
        $queue->enqueue($this->root);

        while (!$queue->isEmpty()) {
            $currentNode = $queue->dequeue();

            // Check the left child
            if ($currentNode->left === null) {
                $currentNode->left = $newNode;
                break;
            } else {
                // Enqueue the left child
                $queue->enqueue($currentNode->left);
            }

            // Check the right child
            if ($currentNode->right === null) {
                $currentNode->right = $newNode;
                break;
            } else {
                // Enqueue the right child
                $queue->enqueue($currentNode->right);
            }
        }
    }

public function print()
{
    if($this->root === null)
    {
        echo "Tree is empty\n";
        return;
    }
    $queue = new Queue();
    $queue->enqueue($this->root);
    while(!$queue->isEmpty())
    {
        $currentNode = $queue->dequeue();
        echo $currentNode->data . " ";
        if($currentNode->left !== null)
        {
            $queue->enqueue($currentNode->left);
        }
        if($currentNode->right !== null)
        {
            $queue->enqueue($currentNode->right);
        }
    }
    echo "\n";
   
    
}
} // end of class




