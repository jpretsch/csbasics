<?php

$array = array(1,9,2,8,5,7,4,0,100,2,56,23);

print "<pre>";
print("Pre sort<br>");
var_export($array);

$array = bubble($array);
print("Post sort<br>");
var_export($array);
print "</pre>";


function bubble($array) {
    $size = count($array)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            if ($array[$k] < $array[$j]) {
                // Swap elements at indices: $j, $k
                list($array[$j], $array[$k]) = array($array[$k], $array[$j]);
            }
        }
    }
    return $array;
}

