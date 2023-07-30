<?php

class Node
{
    public function __construct(
        public mixed $value,
        public ?Node $next = null,
    ) {
    }
}


class Queue {
    public int $length;
    private ?Node $head;
    private ?Node $tail;


    public function __construct()
    {
        $this->length = 0;
        $this->head = $this->tail = null;
    }

    public function enqueue(mixed $value): void {

        $node = new Node($value);

        if(!$this->head){
            $this->head = $this->tail = $node;
        }else {
            $this->tail->next = $node;
            $this->tail = $node;
        }

        $this->length++;
    }

    public function dequeue(): mixed {

        if(!$this->head) {
            throw new Exception("Cant dequeue a empty queue");   
        }

        $value = $this->head->value;
        $this->head = $this->head->next; 
        $this->length--;
        return $value;
    }

    public function peek(): mixed {
        return $this->head?->value;
    }

}