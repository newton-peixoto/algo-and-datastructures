<?php

class Node
{
    public function __construct(
        public mixed $value,
        public ?Node $prev = null,
        public ?Node $next = null,
    ) {
    }
}

class DoublyLinkedList {

    public int $length;
    public ?Node $head;
    public ?Node $tail;

    public function __construct()
    {
        $this->length = 0;
        $this->head = null;
        $this->tail = null;
    }

    public function prepend(mixed $value) {
        $node = new Node($value);

        $this->length++;
        if(!$this->head) {
            $this->head = $this->tail = $node;
            return;
        }

        $node->next = $this->head;
        $this->head->prev = $node;
        $this->head = $node;
    }

    public function insertAt(mixed $value, int $index) {

        if($index < 0 ) {
            throw new Exception("Cant insert at a unexisting index");   
        }

        if($index > $this->length) {
            throw new Exception("Cant insert at a unexisting index");   
        }

        if($index === $this->length) {
            $this->append($value);
            return;
        }

        if($index === 0){
            $this->prepend($value); return;
        }

        $this->length++;
        $current = $this->getAt($index);
        $node = new Node($value);

        $node->next = $current;
        $node->prev = $current->prev;
        $current->prev = $node;

        if($node->prev) {
            $node->prev->next = $node;
        }

    }

    public function append(mixed $value) {
        $this->length++;
        $node = new Node($value);

        if(!$this->tail) {
            $this->head = $this->tail = $node;
            return;
        }

        $node->prev = $this->tail;
        $this->tail->next = $node;
        $this->tail = $node;
    }


    public function remove(mixed $value) {
        
        $current = $this->head;

        for($i = 0; $i < $this->length; $i++) {
            if($current->value === $value) {
                break;
            }

            $current = $current->next;
        }

        if(!$current) {
            return null;
        }

        return $this->removeNode($current);
    }

    public function get(int $index) {
        return $this->getAt($index)?->value;
    }

    public function removeAt(int $index) {
        $current = $this->getAt($index);

        if(!$current) {
            return null;
        }

        return $this->removeNode($current);
    }

    private function removeNode(?Node $node) {
        $this->length--;

        if($this->length === 0) {
            $this->head = $this->tail = null;
            return null;
        }

        if($node->prev) {
            $node->prev->next = $node->next;
        }

        if($node->next) {
            $node->next->prev = $node->prev;
        }

        if($node === $this->head) {
            $this->head = $node->next;
        }

        if($node === $this->tail) {
            $this->tail = $node->prev;
        }

        $node->prev = $node->next = null;

        return $node->value;
    }

    private function getAt(int $index) {
        $current = $this->head;

        for($i = 0; $i < $index && $current; $i++){
            $current = $current->next;
        }

        return $current;
    }
}