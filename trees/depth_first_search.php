<?php 

require './BinaryNode.php';
require '../queue.php';


function search(?BinaryNode $current, $needle): bool 
{
    if($current === null) {
        return false;
    }

    if($current->value === $needle) {
        return true;
    }

    if($current->value <= $needle) {
        return search($current->right, $needle);
    }

    return search($current->left, $needle);
}


/**
 * assuming a binary search tree (order maters)
 */
function depth_first_search(BinaryNode $head, mixed $needle): bool {
    return search($head, $needle);
}

$head = new BinaryNode(5);

$head->left = new BinaryNode(3);
$head->right = new BinaryNode(7);

$head->left->left = new BinaryNode(2);
$head->left->right = new BinaryNode(4);

$head->right->left = new BinaryNode(6);
$head->right->right = new BinaryNode(8);

var_dump(depth_first_search($head, 10));