<?php 
// PHP program for  
// coin change problem. 
  
function count1($S, $m, $n) 
{ 
    // We need n+1 rows as  
    // the table is constructed  
    // in bottom up manner  
    // using the base case 0 
    // value case (n = 0) 
    $table; 
    for ($i = 0; $i < $n + 1; $i++) 
    for ($j = 0; $j < $m; $j++) 
        $table[$i][$j] = 0; 
      
    // Fill the enteries for 
    // 0 value case (n = 0) 
    for ($i = 0; $i < $m; $i++) 
        $table[0][$i] = 1; 
  
    // Fill rest of the table  
    // entries in bottom up manner  
    for ($i = 1; $i < $n + 1; $i++) 
    { 
        for ($j = 0; $j < $m; $j++) 
        { 
            // Count of solutions 
            // including S[j] 
            $x = ($i-$S[$j] >= 0) ?  
                  $table[$i - $S[$j]][$j] : 0; 
  
            // Count of solutions 
            // excluding S[j] 
            $y = ($j >= 1) ?  
                  $table[$i][$j - 1] : 0; 
  
            // total count 
            $table[$i][$j] = $x + $y; 
        } 
    } 
    return $table[$n][$m-1]; 
} 
  
// Driver Code 
$arr = array(1, 2, 3); 
$m = count($arr); 
$n = 4; 
echo count1($arr, $m, $n); 

