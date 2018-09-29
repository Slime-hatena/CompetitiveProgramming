<?php
class In {
    private $array = [];
    private $length = 0;
    private $count = 0;

    function __construct()	{
        while (!feof(STDIN)) {
            $str = trim(fgets(STDIN));
            $this->array = array_merge($this->array, explode(' ', $str));
        }
        $this->length = count($this->array);
    }
    
    public function get(int $i){
        $this->array[$i];
    }

    public function next() {
        return $this->array[$this->count++];
    }
    public function hasNext() {
        return $this->count < $this->length;
    }
    public function nextInt() {
        return (int)$this->next();
    }
    public function nextDouble() {
        return (double)$this->next();
    }
    public function nextString() {
        return (string)$this->next();
    }
}

class Out {
    public static function line($str = "") {
        echo $str . PHP_EOL;
    }
}

$in = new In();
$length = $in->nextInt();
$cnt = 0;
$arr1 = [];
$arr2 = [];

while ($in->hasNext()) {
    if(++$cnt % 2){
        array_push($arr1, $in->nextInt());
    }else{
        array_push($arr2, $in->nextInt());
    }
}

$arr1Counts = array_count_values($arr1);
$arr1KeyCount = max($arr1Counts);
$arr1Key = array_keys($arr1Counts, $arr1KeyCount);

$arr2Counts = array_count_values($arr2);
$arr2KeyCount = max($arr2Counts);
$arr2Key = array_keys($arr2Counts, $arr2KeyCount);

$a1 = $length / 2 - $arr1KeyCount;

var_dump($arr1Key);

if(count(array_intersect($arr1Key, $arr2Key)) === 1 && (count($arr1Key) === 1 && count($arr2Key) === 1)){
    if(count($arr1Key) === 1 && count($arr2Key) === 1){
        if(count($arr1Key) !== 1){
            $a2 = $length / 2 - $arr2KeyCount;
        }else{
            $a2 = $length / 2;
        }

    }else{
        $arr2Counts = array_count_values($arr2);
        rsort($arr2Counts);
        $arr2KeyCount = $arr2Counts[1];

        $a2 = $length / 2 - $arr2KeyCount;
    }
}else{
    $a2 = $length / 2 - $arr2KeyCount;
}

Out::line($a1 + $a2);