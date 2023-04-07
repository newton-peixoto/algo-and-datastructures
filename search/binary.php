<?php 

/**
 * Returns true if the value is found at a ORDERED array.
 */
function binary_search(array $haystack, int $needle): bool
{
    $low = 0;
    $high = count($haystack);

    while($low < $high) {
        $mid = floor($low + ( ($high - $low) / 2)); 
        $currentElement = $haystack[$mid];

        if($currentElement === $needle) {
            return true;
        }else if( $needle > $currentElement) {
            $low = $mid + 1;
        }else {
            $high = $mid;
        }
    }
    return false;
}

