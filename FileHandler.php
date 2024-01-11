<?php

class FileHandler {
    
    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function readEntries() {
        
    }

    public function appendEntry(GuestbookEntry $entry) {
        $handle = fopen($this->filename, 'a');
        fwrite($handle, $entry);
        fclose($handle);
    }
}