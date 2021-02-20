<?php

class Box {
    private $x;

    private function __construct($x)
    {
        $this->x = $x;
    }

    public static function of($x)
    {
        return new static($x);
    }

    public function with(callable $fn)
    {
        return static::of($fn($this->x));
    }

    public function map($fn)
    {
        for($i = 0; $i < count($this->x); $i++){
            $this->x[$i] = $fn($this->x[$i]);
        }
        return static::of($this->x);
    }

    public function filter($fn)
    {
        $arr = [];
        for($i = 0; $i < count($this->x); $i++){
            if($fn($this->x[$i])){
               array_push($arr, $this->x[$i]);
            }
        }
        return static::of($arr);
    }


    public function __invoke()
    {
        return $this->x;
    } 
}
