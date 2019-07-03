<?php
$T = array();

for ($i=0; $i < 5; $i++) {
$T[$i] = $i;
echo $T[$i];
}

echo"<br>";
$K = (sizeof($T, 0))-1;
array_splice($T,2,1);
//array_splice(ARRAY,Element to start at,How many to remove);
for ($i=0; $i < $K; $i++) {

echo $T[$i];
}

?>