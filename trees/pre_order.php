<?php 

require './BinaryNode.php';

function walk(?BinaryNode $current, array &$path): array
{
    if($current === null ) {
        return $path;
    }

    array_push($path, $current->value);

    walk($current->left, $path);
    walk($current->right, $path);

    return $path;
}

function pre_order(BinaryNode $head): void{
    $path = [];
    walk($head, $path);

    foreach($path as $node){
        echo $node . ' -> ';
    }
}

$head = new BinaryNode(1);

$head->left = new BinaryNode(2);
$head->right = new BinaryNode(3);

$head->left->left = new BinaryNode(4);
$head->left->right = new BinaryNode(5);

$head->right->left = new BinaryNode(6);
$head->right->right = new BinaryNode(7);

pre_order($head);