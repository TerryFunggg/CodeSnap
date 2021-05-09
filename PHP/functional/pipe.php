<?php

function pipe(...$fns){
    return function($x) use ($fns) {
        return array_reduce($fns, function($acc, $fn) {
            return $fn($acc);
        }, $x);
    };
}
