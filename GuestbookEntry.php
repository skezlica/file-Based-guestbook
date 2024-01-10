<?php

class GuestbookEntry {

    private $name, $message, $timestamp;

    public function __construct($name, $message) {
        $this->name = $name;
        $this->message = $message;
        $this->timestamp = time();
    }

    public function formatTimestamp($format = 'd-m-y h:i:s')
    {
        return date($format, $this->timestamp);
    }

    public function __toString() {
        return "Name: {$this->name}, Message: {$this->message}, Timestamp: {$this->formatTimestamp()}";
    }
}