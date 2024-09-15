<?php
class KeyValuePair
{
    private $_key;
    private $_value;

    public function __construct($key, $value)
    {
       $this->_key = $key;
       $this->_value = $value;
    }

    public function getKey()
    {
        return $this->_key . PHP_EOL;
    }
    public function getValue()
    {
        return $this->_value . PHP_EOL;
    }
    public function setValue($value)
    {
        $this->_value = $value;
    }

}//end of KeyValuePair class