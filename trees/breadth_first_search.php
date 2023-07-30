<?php 

require './BinaryNode.php';
require '../queue.php';

function breadth_first_search(BinaryNode $head, mixed $needle): bool {
    $queue = new Queue;

    $queue->enqueue($head);

    while($queue->length) {
        $curr = $queue->dequeue();

        if($curr->value ===  $needle) {
            return true;
        }

        if($curr->left) {
            $queue->enqueue($curr->left);
        }

        if($curr->right) {
             $queue->enqueue($curr->right);
        }
    }

    return false;
}

$head = new BinaryNode(1);

$head->left = new BinaryNode(2);
$head->right = new BinaryNode(3);

$head->left->left = new BinaryNode(4);
$head->left->right = new BinaryNode(5);

$head->right->left = new BinaryNode(6);
$head->right->right = new BinaryNode(7);

var_dump(breadth_first_search($head, 2));