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



$queue = new Queue();

echo "Enqueue 10" . PHP_EOL; 
$queue->enqueue(10);
echo "Enqueue 5" . PHP_EOL; 
$queue->enqueue(5);
echo "Enqueue 20" . PHP_EOL; 
$queue->enqueue(20);
echo "Enqueue 110" . PHP_EOL; 
$queue->enqueue(110);

#echo $queue->length;

echo "removed of queue " . $queue->dequeue() . PHP_EOL;
echo "removed of queue " . $queue->dequeue() . PHP_EOL;
echo "remaning items on queue " . $queue->length . PHP_EOL;
echo "removed of queue " . $queue->dequeue() . PHP_EOL;
echo "removed of queue " . $queue->dequeue() . PHP_EOL;

echo "Enqueue 80" . PHP_EOL; 
$queue->enqueue(80);
echo "Enqueue 90" . PHP_EOL; 
$queue->enqueue(90);
echo "remaning items on queue " . $queue->length . PHP_EOL;

echo "current peek " . $queue->peek() . PHP_EOL;
echo "removed of queue " . $queue->dequeue() . PHP_EOL;
echo "removed of queue " . $queue->dequeue() . PHP_EOL;
echo "remaning items on queue " . $queue->length . PHP_EOL;
