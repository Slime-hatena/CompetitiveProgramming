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

function check($x, $y, $h){
    global $infos;

    if($x < 0 || $x > 100 || $y < 0 || $y > 100 || $h > 100){
        return false;
    }
    if(array_key_exists($x, $infos) && array_key_exists($y, $infos[$x])){
        if($infos[$x][$y] <= $h){
            return false;
        }
    }
    return true;
}

function add($x, $y, $h){
    global $infos;

    if(!check($x, $y, $h)){
        return false;
    }
    $infos[$x][$y] = $h;
    return true;
}

$in = new In();

$n = $in->nextInt();
$infos = [];  //[x][y] = pos


for ($i = 0; $i < $n; ++$i) { 
    $infos[$in->nextInt()][$in->nextInt()] = $in->nextInt();
}

foreach ($infos as $x => $array) {
    $cnt = 0;
    foreach ($array as $y => $h) {
        // x+方向
        while(true){
            ++$cnt;
            $nx = $x + $cnt;
            $ny = $y;
            $nh = $h + $cnt;
            if(!add($nx, $ny, $nh)){
                break;
            }
        }

        // x-方向
        while(true){
            ++$cnt;
            $nx = $x - $cnt;
            $ny = $y;
            $nh = $h + $cnt;
            if(!add($nx, $ny, $nh)){
                break;
            }
        }

        // y+方向
        while(true){
            ++$cnt;
            $nx = $x;
            $ny = $y + $cnt;
            $nh = $h + $cnt;
            if(!add($nx, $ny, $nh)){
                break;
            }
        }

        // x+方向
        while(true){
            ++$cnt;
            $nx = $x;
            $ny = $y - $cnt;
            $nh = $h + $cnt;
            if(!add($nx, $ny, $nh)){
                break;
            }
        }
        
    }
}

ksort($infos);
foreach ($infos as $x => $array) {
    ksort($array);
    foreach ($array as $y => $h) {
        echo $x . " / " . $y . " / " . $h . "\n";
    }
}
// Out::line($in->nextInt());
