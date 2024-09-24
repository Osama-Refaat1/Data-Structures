<?php 
require 'BSTNode.php';
require '../Queue/queue.php';
class BSTree
{
public  ?BSTNode $root;
public function __construct() {
$this->root = null;

}

public function BSInsert($_data) : void {

    $newNode = new BSTNode($_data);
    if($this->root == null) {
        $this->root = $newNode;
        return;
    } else {
        $currentNode = $this->root;
        while($currentNode != null) {
            if($newNode->data < $currentNode->data) {
                if($currentNode->left == null) {
                    $currentNode->left = $newNode;
                    break;
                } else {
                    $currentNode = $currentNode->left;
                }
            } else {
                if($currentNode->right == null) {
                    $currentNode->right = $newNode;
                    break;
                } else {
                    $currentNode = $currentNode->right;
                }
            }
        }
    }
}

public function BSFind($_data) : mixed {
    $currentNode = $this->root;
    while($currentNode != null) {
        if($currentNode->data == $_data) {
            return $currentNode;
        } else if($_data < $currentNode->data) {
            $currentNode = $currentNode->left;
        } else {
            $currentNode = $currentNode->right;
        }
    }
    echo "Not found";
    return null; 


}

 function BSFindParent($_givenNode) : mixed {
$currentNode = $this->root;
while($currentNode != null) {
   if($currentNode->left == $_givenNode || $currentNode->right == $_givenNode) {
       return $currentNode;
   } else if($_givenNode->data < $currentNode->data) {
       $currentNode = $currentNode->left;
   } else {
       $currentNode = $currentNode->right;
   }

}
echo "Parent not found";
return null;

}
/*--------------------------DELETE FUNCTON AND ITS HELPERS----------------------------*/

//case 1 of delete : Leaf Node
 function deleteLeaf($_nodeToDelele) : void {
$parentOfNodeToDelete = $this->BSFindParent($_nodeToDelele);

if($parentOfNodeToDelete->left == $_nodeToDelele) {
    $parentOfNodeToDelete->left = null;
} else {
    $parentOfNodeToDelete->right = null;
}
echo "The node was a leaf and has been deleted";
}

//case 2 of delete : Node with one child
 function deleteNodeWithOneChild($_nodeToDelele) : void {


//Get the child node
if($_nodeToDelele->left != null) $childNode = $_nodeToDelele->left;
else $childNode = $_nodeToDelele->right;

$_nodeToDelele->data = $childNode->data;
$_nodeToDelele->left = $childNode->left;
$_nodeToDelele->right = $childNode->right;

echo "The node with one child has been deleted";

}

//case 3 of delete : Node with two children
function deleteNodeWithTwoChildren($_nodeToDelele) : void {
$currentNode = $_nodeToDelele->right; 
$smallestParent = null;
while($currentNode->left!=null){
    $smallestParent = $currentNode;
    $currentNode = $currentNode->left;
}  

if($smallestParent != null) {
 $smallestParent->left = $currentNode->right;
} else {
    $_nodeToDelele->right = $currentNode->right;
}

$_nodeToDelele->data = $currentNode->data;

return;
}

public function BSDelete ($_data): void {
if($this->root == null) {
    echo "Tree is empty";
    return;
}
$nodeToDelete = $this->BSFind($_data);
if($nodeToDelete == null) {
    echo "Node not found";
    return;
}
if($nodeToDelete->left == null && $nodeToDelete->right == null) {
    $this->deleteLeaf($nodeToDelete->data);

} else if($nodeToDelete->left == null ^ $nodeToDelete->right == null) {
    $this->deleteNodeWithOneChild($nodeToDelete->data);

} else {
    $this->deleteNodeWithTwoChildren($nodeToDelete);
}

}

/*---------------------PRINT USING IN-ORDER TRAVERSE METHOD------------------------------- */
function BSinternalInOrder($_node){
    if($_node === null) return;
    $this->BSinternalInOrder($_node->left);
    echo $_node->data . "->";
    $this->BSinternalInOrder($_node->right);
}
public function BSInOrder(){
    $this->BSinternalInOrder($this->root);
    echo "\n";
}

/*---------------------PRINT USING BREADTH(LEVEL) FIRST SEARCH TRAVERSE METHOD------------------------------- */
public function BSPrintUsingBFS() : mixed {
if($this->root == null) return "Tree is empty";
$q = new Queue();
$q->enqueue($this->root);
while(!$q->isEmpty()) {
$currentNode = $q->dequeue();
echo $currentNode->data;
if($currentNode->left != null) $q->enqueue($currentNode->left);
if($currentNode->right != null) $q->enqueue($currentNode->right);
}
echo PHP_EOL;
return null;
}

/*--------------------------BALANCE FUNCTON AND ITS HELPERS----------------------------*/
public function balance() {
$nodes = [];
$this->treeToArray($this->root, $nodes);
$this->root = $this->recursiveBalance(0 , (count($nodes))-1 , $nodes);

}


public function treeToArray($_node, &$nodes) {
if($_node == null) return;
$this->treeToArray($_node->left , $nodes);
$nodes[] = $_node->data;
$this->treeToArray($_node->right , $nodes);

}

public function recursiveBalance($start , $end , &$nodes): mixed {
if($start > $end) return null;
$mid = ($start + $end) /2 ;
$newNode = new BSTNode($nodes[$mid]);
$newNode->left = $this->recursiveBalance($start , $mid -1 , $nodes);
$newNode->right = $this->recursiveBalance($mid + 1 , $end , $nodes);

return $newNode;
}

}//end of class