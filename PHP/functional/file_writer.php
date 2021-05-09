<?php

class FileWriter {
    private $file;

    public static function write(callable $fn) {
        $f = $fn(new static());
        $f->close();
    }

    public function setFile(string $filename) {
        $this->file = fopen($filename, "w");
        return $this;
    }

    public function writeFile(string $text) {
        fwrite($this->file, $text);
        return $this;
    }

    public function close() {
        fclose($this->file);
    }
}

FileWriter::write(function($f) {
    return $f
        ->setFile("test.txt")
        ->writeFile("hello world");
});
