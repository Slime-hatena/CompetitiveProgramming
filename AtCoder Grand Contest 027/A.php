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

$people = $in->nextInt();
$candy = $in->nextInt();
$first = $candy;
$qtys = [];

for ($i = 0; $i < $people; ++$i) {
    $qtys[$i] = $in->nextInt();
}
sort($qtys);

$cnt = 0;
foreach ($qtys as $key => $value) {
    $candy -= $value;
    if($candy == 0){
        ++$cnt;
        break;
    }else if($candy < 0){
        break;
    }else{
        ++$cnt;
    }
}

if($candy > 0){
    --$cnt;
}

Out::line($cnt);