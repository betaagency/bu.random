<?php
def('random_seed', function($seed=null){
        static $t = null;
        if(is_null($t))
                $t = new mersenne_twister\twister(microtime(true));

        if(!is_null($seed))
                $t = new mersenne_twister\twister($seed);
        return $t;
});
def('random', function($min, $max){
        if(is_float($min) or is_float($max))
                return random_seed()->rangereal_open($min, $max);
        return random_seed()->rangeint($min, $max);
});
