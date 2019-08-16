<?php
function duplicate_encode($word){
    
    $return = '';
    $uniqueChars = count_chars($word,3);
    $uniqueCharArray = str_split($uniqueChars);
    $charFrequency = array();
    var_export($uniqueChars); echo "\n";
    foreach($uniqueCharArray as $key => $value)
    $wordArray = str_split($word);
    foreach($wordArray as $key => $value){
        
    }
    var_export($stringData);
}

$input = array(
"din"      =>  "(((",
"recede"   =>  "()()()",
"Success"  =>  ")())())",
"(( @"     =>  "))(("
);

foreach($input as $key => $value){
    duplicate_encode($key);
}