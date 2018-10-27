<?php
class In {
    public $array = [];
    function __construct()	{
        while (!feof(STDIN)) {
            $str = trim(fgets(STDIN));
            $this->array = array_merge($this->array, explode(' ', $str));
        }
        $this->length = count($this->array);
    }
}
 
class Out {
    public static function line($str = "") {
        echo $str . PHP_EOL;
    }
}
 
 
$in = new In();
array_splice($in->array, 0, 1);
 
$length = count($in->array);
sort($in->array);
$large = $in->array;
$small = array_splice($large, 0, $length / 2);
rsort($large);
 
$flag = (bool)($length % 2);
 
$ans = "";
$smallCnt = 0;
$largeCnt = 0;
$smallLength = count($small);
$largeLength = count($large);
 
$flag = !$flag;
 
if($flag){
    $ans = $large[$largeCnt++];
}else{
    $ans = $small[$smallCnt++];
}
$flag = !$flag;
 
$switch = 0;
while (true) {
    $left = substr($ans, 0, 1);
    $right = substr($ans, -1, 1);
 
    if($flag){
        if($largeCnt >= $largeLength){
            $switch = 0;
            $flag != $flag;
        }else{
            $t = $large[$largeCnt++];
            if(abs($t - $left) > abs($t - $right)){
                $ans = $t . "," . $ans;
            }else{
                $ans = $ans . "," . $t;
            }
            ++$switch;
        }
 
    }else{
        if($smallCnt >= $smallLength){
            $switch = 0;
            $flag = !$flag;
        }else{
            $t = $small[$smallCnt++];
            if(abs($t - $left) > abs($t - $right)){
                $ans = $t . "," . $ans;
            }else{
                $ans = $ans . "," . $t;
            }
            ++$switch;
        }
    }
 
    if($switch >= 2){
        $switch = 0;
        $flag = !$flag;
    }
 
 
    if($smallCnt >= $smallLength && $largeCnt >= $largeLength){
        break;
    }
}
$arr = explode(',', $ans);
 
$ans = 0;
for ($i = 0; $i < $length - 1; ++$i) { 
    $ans += ($arr[$i] > $arr[$i + 1]) ? $arr[$i] - $arr[$i + 1] : $arr[$i + 1] - $arr[$i];
}
 
Out::line($ans);