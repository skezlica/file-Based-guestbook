<?php

class GuestbookEntry {

    private $name, $message, $timestamp;

    public function __construct(string $name, string $message) {
        $this->name = $name;
        $this->message = $message;
        $this->timestamp = time();
    }

    public function formatTimestamp(string $format = 'd-m-y h:i:s')
    {
        return date($format, $this->timestamp);
    }

    public function __toString() {
return "Name: {$this->name},
Message: {$this->message}, 
Timestamp: {$this->formatTimestamp()}
    
";
    }
}