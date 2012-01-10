<?php
doc_group('Random');

doc('Устанавливает начальную точку для генератора случайных чисел');
def('random_seed', function($seed=null){
        static $t = null;
        if(is_null($t))
                $t = new mersenne_twister\twister(microtime(true));

        if(!is_null($seed))
                $t = new mersenne_twister\twister($seed);
        return $t;
});

doc('Возвращает случайное число в заданном диапазоне');
def('random', function($min=0, $max=1){
        if(is_float($min) or is_float($max))
                return random_seed()->rangereal_open($min, $max);
        return random_seed()->rangeint($min, $max);
});
