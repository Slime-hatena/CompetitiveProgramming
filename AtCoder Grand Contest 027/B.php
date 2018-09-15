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

function move($currentDust, int $pos = 1){
    return pow($currentDust + 1, 2) * $pos;
}

$in = new In();
$dust = $in->nextInt();
$energy = $in->nextInt();
$total = 0;

$pos[0] = 0;
{
    $i = 1;
    while ($in->hasNext()) {
        $pos[$i++] = $in->nextInt();
    }
}

$currentEnergy = move(0, $pos[1]);
$currentCount = 1;
$currentDust = 0;

Out::line("energy " . $currentEnergy . " / move to " . $pos[$currentCount]);

while (true) {
    if(Count($pos) > $currentCount + 1){
        $throughNextDustScore = move($currentDust, $pos[$currentCount + 1] - $pos[$currentCount]);
    }else{
        Out::line("?");
        $throughNextDustScore = PHP_INT_MAX;
    }

    $getAndDumpDustAndReturnScore = 0;
    $c = $currentCount;
    $d = $currentDust + 1;

    while (true) {
        $getAndDumpDustAndReturnScore += move($d++, $pos[$c] - $pos[$c - 1]) + $energy;
        --$c;
         if($c == 0){
            $getAndDumpDustAndReturnScore += $energy + move(0, $pos[$currentCount]);
            break;
        }
    }

    if($getAndDumpDustAndReturnScore > $throughNextDustScore){
        $currentEnergy += $throughNextDustScore;
        ++$currentCount;
        Out::line("energy " . $currentEnergy . " / through " . $throughNextDustScore . " / move to " . $pos[$currentCount]);

    }else{
        $currentEnergy += $getAndDumpDustAndReturnScore;
        $temp = move(0, $pos[$currentCount]);
        $pos = array_splice($pos, 1, $currentCount);
        $currentCount = 1;
        Out::line("energy " . $currentEnergy . " / dump " . $getAndDumpDustAndReturnScore . " / move to " . $pos[$currentCount]);
        if(Count($pos) === 1){
            $currentEnergy -= $temp;
            break;
        }
    }
}

Out::line($currentEnergy);