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

class Way{
    public $cost;
    public $time;

    function __construct($c, $t)
    {
        $this->cost = $c;
        $this->time = $t;
    }
}

function cmp($a, $b) {
    return ($a->cost > $b->cost);
}

$in = new In();

$n = $in->nextInt();
$limit = $in->nextInt();
$ways = [];

for ($i = 0; $i < $n; ++$i) {
    $temp = new Way($in->nextInt(), $in->nextInt());
    array_push($ways, $temp);
}
usort($ways , "cmp");

$out = "TLE";
for ($i = 0; $i < $n; ++$i) {
    if($ways[$i]->time <= $limit){
        $out = $ways[$i]->cost;
        break;
    }
}

Out::line($out);