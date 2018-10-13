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

class Str{
    public $str = [];
    public $length;
}

function gcd($m, $n){
    if($n > $m) list($m, $n) = array($n, $m);
     
    while($n !== 0){
        $tmp_n = $n;
        $n = $m % $n;
        $m = $tmp_n;
    }
    return $m;
}
 
function lcm($m, $n){
    return $m * $n / gcd($m, $n);
}

$in = new In();

$s = new Str();
$t = new Str();
$x = new Str();

$s->length = $in->nextInt();
$t->length = $in->nextInt();
$s->str = str_split($in->nextString());
$t->str = str_split($in->nextString());
$x->length = lcm($s->length, $t->length);

function calcPos($n){
    global $x;

    $ret = [1];
    $cnt = 0;
    while(true){
        $temp = ++$cnt * $x->length / $n + 1;
        $ret[] = $temp;
        if($cnt >= $n - 1){
            break;
        }
    }
    return $ret;
}

$ans = $x->length;

$pos = calcPos($s->length);
$cnt = count($pos);
for ($i = 0; $i < $cnt; ++$i) { 
    $x->str[$pos[$i]] = $s->str[$i];
}

$pos = calcPos($t->length);
$cnt = count($pos);
for ($i = 0; $i < $cnt; ++$i) { 
    if(array_key_exists($pos[$i], $x->str) && $x->str[$pos[$i]] != $t->str[$i]){
        $ans = -1;
        break;
    }
    $x->str[$pos[$i]] = $t->str[$i];
}

Out::line($ans);