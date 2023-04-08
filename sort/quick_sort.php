<?php 


function qs(array &$elements, int $low, int $high): void
{
    if($low >= $high) {
        return;
    }

    $pivotIndex = partition($elements, $low, $high);

    qs($elements, $low, $pivotIndex -  1);
    qs($elements, $pivotIndex + 1, $high);
}

function swap(array &$array, int $from, int $to) {
    $tmp = $array[$from];
    $array[$from] = $array[$to];
    $array[$to] = $tmp;
}

function partition(array &$elements, int $low, int $high): int {

    // choose a random pivot
    $pivotIndex = (int) rand($low + 1, $high);

    // swap random pivot with the highest position
    swap($elements, $high, $pivotIndex);
    
    $pivot = $elements[$high];
    $index = $low - 1;

    // put all lower elements at left of my pivot 
    for($i = $low; $i < $high; $i++){
        if( $elements[$i] <= $pivot) {
            $index++;
            swap($elements, $i, $index);
        }
    }
    // put the pivot at  lower element + 1 position;
    $index++;
    swap($elements, $high, $index);

    return $index;
}

function quick_sort(array &$elements): void {
    qs($elements, 0, count($elements) - 1);
}


$array = [8,10,12,30,25,1];


var_dump($array);

echo 'After Sorting' . PHP_EOL;

quick_sort($array);

var_dump($array);