<?php

class FileHandler {
    
    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function readEntries() {
        $entries = [];
        $handle = fopen($this->filename, 'r');
        while (!feof($handle)) {
            $line = fgets($handle);
            if (!empty($line)) {
                $entryData = json_decode($line, true);
                if ($entryData) {
                    $entries[] = new GuestbookEntry($entryData['name'], $entryData['message']);
                }
            }
        }
        fclose($handle);
        return $entries;
    }

    public function appendEntry(GuestbookEntry $entry) {
        $handle = fopen($this->filename, 'a');
        $entryData = [
            'name' => $entry->getName(),
            'message' => $entry->getMessage(),
            'timestamp' => $entry->formatTimestamp('Y-m-d H:i:s'),
        ];
        fwrite($handle, json_encode($entryData) . PHP_EOL);
        fclose($handle);
    }
}