<?php

class FileHandler {
    
    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function readEntries() {
        $handle = fopen($this->filename, 'r');
        while (!feof($handle)) {
            $line = fgets($handle) . "<br>";
            echo $line;
        }
        fclose($handle);
    }

    public function appendEntry(GuestbookEntry $entry) {
        $handle = fopen($this->filename, 'a');
        fwrite($handle, $entry);
        fclose($handle);
    }
}