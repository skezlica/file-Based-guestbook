<?php

class Guestbook {

    private $entries = [];

    public function addEntry(GuestbookEntry $entry) {
        $this->entries[] = $entry; 
    }

    public function getAllEntries() {
        return $this->entries;
    }
}