<?php 

function bubble_sort(array $items): array
{
    for ($i=0; $i < count($items) - 1 ; ++$i) { 
        for ($j= 0; $j < count($items) - 1 - $i; ++$j) { 
            $k = $j + 1;
            if($items[$j]  > $items[$k]) {
                $tmp = $items[$j];
                $items[$j] = $items[$j+1];
                $items[$j+1] = $tmp;
            }
        }
    }

    return $items;
}


var_dump(bubble_sort(
    [3,2,1,0,10,8,5]
));