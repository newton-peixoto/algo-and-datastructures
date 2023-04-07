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



$stack = new Stack();

echo "Push 10" . PHP_EOL; 
$stack->push(10);
echo "Push 5" . PHP_EOL; 
$stack->push(5);
echo "Push 20" . PHP_EOL; 
$stack->push(20);
echo "Push 110" . PHP_EOL; 
$stack->push(110);

#echo $stack->length;

echo "pop of stack " . $stack->pop() . PHP_EOL;
echo "pop of stack " . $stack->pop() . PHP_EOL;
echo "remaning items on stack " . $stack->length . PHP_EOL;
echo "pop of stack " . $stack->pop() . PHP_EOL;
echo "pop of stack " . $stack->pop() . PHP_EOL;

echo "push 80" . PHP_EOL; 
$stack->push(80);
echo "Push 90" . PHP_EOL; 
$stack->push(90);
echo "remaning items on stack " . $stack->length . PHP_EOL;

echo "current peek " . $stack->peek() . PHP_EOL;
echo "pop of stack " . $stack->pop() . PHP_EOL;
echo "pop of stack " . $stack->pop() . PHP_EOL;
echo "remaning items on stack " . $stack->length . PHP_EOL;
