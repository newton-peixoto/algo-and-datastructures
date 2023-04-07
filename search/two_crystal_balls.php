<?php 



/**
 * Given an ordered array of break points and two crystal balls return 
 * the first position which the balls breaks in the most optimized way
 * 
 * 
 * 
 * this is a yet another way to think of a binary search. instead of jump in logn we
 * will be jumping in sqrt(n) steps
 */
function find_break_point(array $breaks): int|false {

    $jumpFactor = floor(
        sqrt(count($breaks))
    );
    $index = $jumpFactor;
    echo "JUMP FACTOR " . $jumpFactor . PHP_EOL;
    // search for a position which breaks the ball we gonna still have one left
    for(; $index < count($breaks); $index += $jumpFactor){
        echo "first loop indexes: " .  $index .  PHP_EOL;
        if($breaks[$index]) {
            break;
        }
    }

    // once we find out the sqrt piece of the array that breaks.. 
    // we will walk this piece in a linear way; 

    // step one factor back to loop this specific part.
    echo $index . PHP_EOL;
    $index -= $jumpFactor;

    for($j = 0; $j <= $jumpFactor && $index < count($breaks); $j++, $index++) {
        echo "second loop indexes: " .  $index .  PHP_EOL;
        if($breaks[$index]) {
            return $index;
        }
    }

    return false;
}

// example

$array = [false, false, false, false, false, false, false, false, false, false, false, false, false, true, true, true, true, true, true, true, true];


var_dump(find_break_point($array));