<?php
require_once 'TreeNode.php';
require_once '../Queue/queue.php';

class BinaryTree {
    private  ?TreeNode $root;

    public function __construct() {
        $this->root = null;

    }

  public function insert($value) {
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

public function print(){
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

 function internalHeight($_node): int {
if($_node == null) return 0;
return 1 + max($this->internalHeight($_node->left), $this->internalHeight($_node->right));
}

public function height(): int {
    return $this->internalHeight($this->root);
}

//1. Breadth first search or level order traversal (used in findLast method)
public function BFS(): ?TreeNode{
    if($this->root === null)
    {
        echo "Tree is empty\n";
        return null;
    }
    $queue = new Queue();
    $queue->enqueue($this->root);
    while(!$queue->isEmpty())
    {
        $currentNode = $queue->dequeue();
        if($currentNode->left !== null)
        {
            $queue->enqueue($currentNode->left);
        }
        if($currentNode->right !== null)
        {
            $queue->enqueue($currentNode->right);
        }
    }
    return $currentNode;
    
}

public function findLast(): ?TreeNode{
    return $this->BFS();
}

//2.Pre-order traversal used in find method
 function internalPreOrder($_node , $_value): ?TreeNode{
    if($_node === null) return null;

    if($_node->data == $_value){
        // echo "Found\n";
        return $_node;
    }

    $foundInLeft = $this->internalPreOrder($_node->left, $_value);
    if($foundInLeft !== null) return $foundInLeft;

    $foundInRight = $this->internalPreOrder($_node->right, $_value);
    if($foundInRight !== null) return $foundInRight;
    

    return null;
}

public function find($_value): ?TreeNode{
    return $this->internalPreOrder($this->root, $_value);
}

public function findParent($_value): ?TreeNode{
    if($this->root === null) return null;
    $queue = new Queue();
    $queue->enqueue($this->root);
    while(!$queue->isEmpty())
    {
        $currentNode = $queue->dequeue();
        
        if($currentNode->left !== null)
        {
            if($currentNode->left->data == $_value) return $currentNode;
            $queue->enqueue($currentNode->left);
        }
        if($currentNode->right !== null)
        {
            if($currentNode->right->data == $_value) return $currentNode;
            $queue->enqueue($currentNode->right);
        }
    }
    return null;
    
}

public function delete($_value){
if($this->root === null){
    echo "Tree is empty\n";
    return;
}
//get the node to be deleted
$nodeToDelete = $this->find($_value);
if($nodeToDelete === null){
    echo "Node not found" . PHP_EOL;
    return;
}
//get the parent of the node to be deleted
$nodeToDeleteParent = $this->findParent($_value);
//get the last node
$lastNode = $this->findLast();
//get the parent of the last node
$lastNodeParent = $this->findParent($lastNode->data);

//if the node to be deleted is the root
if($nodeToDelete ==$this->root){
    $this->root->data = $lastNode->data;
    if($lastNodeParent->right == $lastNode){
        $lastNodeParent->right = null;
    }else{
        $lastNodeParent->left = null;
    }
    echo "Node deleted was the root." . PHP_EOL;
    return;
}
//if the node to be deleted is an internal node
elseif($nodeToDelete->left !=null || $nodeToDelete->right !=null){
    //if the node to be deleted is the parent of the last node
    if($nodeToDelete === $lastNodeParent){
        if($lastNodeParent->right === $lastNode) $lastNode->left = $lastNodeParent->left;
        else $lastNode->right = $$lastNodeParent->right;
        //altering the nodeToDeleteParent
        if($nodeToDeleteParent->right == $nodeToDelete) $nodeToDeleteParent->right = $lastNode;
        else $nodeToDeleteParent->left = $lastNode;
        $nodeToDelete = null;
        echo "Node deleted was an internal and was the parent of last node." . PHP_EOL;
        return;
    }
    //if the node to be deleted is not the parent of the last node
    else{
        //altering nodeToDelete children
        $lastNode->right = $nodeToDelete->right;
        $lastNode->left = $nodeToDelete->left;

        //altering the lastNodeParent
        if($lastNodeParent->right == $lastNode) $lastNodeParent->right = null;
        else $lastNodeParent->left = null;


    //altering the nodeToDeleteParent 
        if($nodeToDeleteParent->right == $nodeToDelete) $nodeToDeleteParent->right = $lastNode;
        else $nodeToDeleteParent->left = $lastNode;
           
        
        $nodeToDelete = null;
        echo "Node deleted was an internal but not the parent of last node." . PHP_EOL;
        return;
        

    }

}

//if the node to be deleted is a leaf node
else{
    
    if($nodeToDeleteParent->right == $nodeToDelete) $nodeToDeleteParent->right = $lastNode; 
    else $nodeToDeleteParent->left = $lastNode;
    
    if($lastNodeParent->right == $lastNode) $lastNodeParent->right = null;
    else $lastNodeParent->left = null;
    
    $nodeToDelete = null;
    echo "Node deleted was a leaf node." . PHP_EOL;
    return;
}

}

//3.In-order traversal
 function internalInOrder($_node){
    if($_node === null) return;
    $this->internalInOrder($_node->left);
    echo $_node->data . "->";
    $this->internalInOrder($_node->right);
}
public function inOrder(){
    $this->internalInOrder($this->root);
    echo "\n";
}

//4.Post-order traversal
 function internalPostOrder($_node){
    if($_node === null) return;
    $this->internalPostOrder($_node->left);
    $this->internalPostOrder($_node->right);
    echo $_node->data . "->";
}
public function postOrder(){
    $this->internalPostOrder($this->root);
    echo "\n";
}

} // end of class