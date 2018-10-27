<?php
$array = [];
$first = false;
while (!feof(STDIN)) {
    $str = trim(fgets(STDIN));

    if(!$first){
        $length = (int)$str;
        $first = true;
    }else{
        $array[] = (int)$str;
    }
}

sort($array);

$ans0[] = -1;
$ans1[] = 1;

for ($i = 1; $i < $length - 1; ++$i) { 
    if((bool)($i % 2)){
        $ans0[] = 2;
        $ans1[] = -2;
    }else{
        $ans0[] = -2;
        $ans1[] = 2;
    }
}

if((bool)($length % 2)){
    $ans0[] = -1;
    $ans1[] = 1;
}else{
    $ans0[] = 1;
    $ans1[] = -1;
}

sort($ans0);
sort($ans1);

$a0 = 0;
$a1 = 0;

for ($i = 0; $i < $length; ++$i) { 
    $a0 += $array[$i] * $ans0[$i];
    $a1 += $array[$i] * $ans1[$i];
}

echo max($a0, $a1) . PHP_EOL;