<?php
class Hash
{
    public function Hash32($data): int
    {
        $offsetBasis = 2166136261;
        $FNVPrime = 16777619;
        
        // Initialize the hash with the offset basis
        $hash = $offsetBasis;
        
        // Convert input data to a byte array
        $byteArray = $this->toByteArray($data);
        
        // Iterate over each byte of the data
        foreach ($byteArray as $byte) {
            $hash ^= $byte;        // XOR the low 8 bits of the hash with the current byte
            $hash *= $FNVPrime;    // Multiply by the FNV prime
        }
        
        return $hash;
    }
    
    private function toByteArray($data): array
    {
        $byteArray = [];
        
        // If the input is a string
        if (is_string($data)) {
            // Convert string to byte array (using ord() to get ASCII values)
            for ($i = 0; $i < strlen($data); $i++) {
                $byteArray[] = ord($data[$i]);
            }
        }
        // If the input is an integer
        elseif (is_int($data)) {
            // Convert the integer to a 4-byte array (big-endian format)
            $byteArray = array_values(unpack('C*', pack('N', $data)));
        }
        // If the input is an array (e.g., array of integers or strings)
        elseif (is_array($data)) {
            foreach ($data as $item) {
                // Recursively convert each array element to a byte array
                $byteArray = array_merge($byteArray, $this->toByteArray($item));
            }
        }
        // If the input is a float
        elseif (is_float($data)) {
            // Convert float to a 4-byte array
            $byteArray = array_values(unpack('C*', pack('f', $data)));
        }
        // You can add more data types here if needed (objects, etc.)
        else {
            throw new InvalidArgumentException("Unsupported data type");
        }
        
        return $byteArray;
    }
}

// Example usage:
$hasher = new Hash();
echo $hasher->Hash32("hello");      // Hashes a string
echo $hasher->Hash32(12345);        // Hashes an integer
echo $hasher->Hash32([123, 456]);   // Hashes an array of integers
