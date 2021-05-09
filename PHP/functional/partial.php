<?php

function partial($fn, ...$x){
    return function(...$y) use ($fn, $x){
        return $fn(...array_merge($x,$y));
    };
}

function partialRight($fn, ...$x){
    return function(...$y) use($fn, $x){
        return $fn(...array_merge($y, $x));
    };
}
