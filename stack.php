<?php

class Node
{
    public function __construct(
        public mixed $value,
        public ?Node $prev = null,
    ) {
    }
}


class Stack {
    public int $length;
    private ?Node $head;


    public function __construct()
    {
        $this->length = 0;
        $this->head = $this->tail = null;
    }

    public function push(mixed $value): void {

        $this->length++;
        $node = new Node($value);

        if(!$this->head){
            $this->head  = $node;
            return;
        }
        $head = $this->head;
        $node->prev = $head;
        $this->head = $node;
    }

    public function pop(): mixed {

        if(!$this->head) {
            throw new Exception("Cant pop an empty stack");   
        }

        $value = $this->head->value;
        $this->head = $this->head->prev; 
        $this->length--;
        return $value;
    }

    public function peek(): mixed {
        return $this->head?->value;
    }

}