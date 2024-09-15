<?php
require_once 'KeyValuePair.php';
class Dictionary
{
    private $entries;

    public function __construct()
    {
        $this->entries = [];
    }

    public function add(string $key, $value): void
    {
        if (array_key_exists($key, $this->entries)) {
            $this->entries[$key]->setValue($value);
        } else {
            $this->entries[$key] = new KeyValuePair($key, $value);
        }
    }

    public function get(string $key)
    {
        if (array_key_exists($key, $this->entries)) {
            return $this->entries[$key]->getValue(); 
        }
        return  "Key not found" . PHP_EOL;
    }

    public function remove(string $key): void
    {
        if (array_key_exists($key, $this->entries)) {
            unset($this->entries[$key]);
            echo "KeyValuePair removed" . PHP_EOL;
        }
    }

    public function containsKey($key): bool
    {
        
        return array_key_exists($key, $this->entries);
    }

    public function size(): int
    {
        return count($this->entries);
    }
    public function print(): void
    {
        foreach ($this->entries as $key => $value) {
            echo $key . " => " . $value->getValue() . PHP_EOL;
        }
    }
}
