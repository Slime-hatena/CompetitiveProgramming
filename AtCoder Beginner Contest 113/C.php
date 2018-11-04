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
}

class Out {
    public static function line($str = "") {
        echo $str . PHP_EOL;
    }
}

$in = new In();

$total = $in->nextInt();
$length = $in->nextInt();
$array = [];

$i = 0;
while($in->hasNext()){
    $array[$in->nextInt()][] = [
        'num' => $in->nextInt(),
        "id" => $i++
    ];
}

$answer = [];
foreach ($array as $key => $value) {
    array_multisort(array_column($value, 'num'), SORT_ASC, $value);
    foreach ($value as $k => $v) {
        $answer[$v['id']] = sprintf('%06d', $key) . sprintf('%06d', $k + 1);
    }
}

for ($i = 0; $i < $length; ++$i) { 
    Out::line($answer[$i]);
}