<?php

$pass= rand(1000, 9999); 
        $number = 1230;
        
$array = array();
while ($number > 0) {
    $x = $number % 10;
    
if ($x == 0){
    $y = strval(decbin(10)); 
} 
    elseif ($x > 1 and $x < 4 ) 
    {
    $y = '00'.strval(decbin($x)).'';
} 
    elseif ($x > 3 and $x < 8 ) 
    {
    $y = '0'.strval(decbin($x)).'';
} 


    elseif ($x == 1){
        $y = '000'.strval(decbin($x)).'';
    }
    else
    {
        $y = strval(decbin($number % 10));
    }
    $array[] = $y;
    
    $number = intval($number / 10); 
}
$array = array_reverse($array);

$perco_num = bindec(''.$array[0].''.$array[1].''.$array[2].''.$array[3].'');

echo $perco_num;

?>