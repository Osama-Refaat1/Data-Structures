<?php
function resizeArray($array, $newSize) {
    $currentSize = count($array);
    if($newSize < 0) {
        return "Please enter a valid Number";
    }
    elseif ($newSize < $currentSize) {
        //array_slice(array to be sliced (to reduce the size) , offset means to start from beginning if positive and end if negative , newSize (where the trim stops))
        return array_slice($array, 0, $newSize);
    } elseif ($newSize > $currentSize) {
        //here the array_fill creates a new array and fill it with 0 and add it to the original array to make it larger
        //array_fill(start index , number of elements to fill(اعتبره الزيادة الي هنحطها على القديم) , value to fill with ( zero or string or null whatever y3ni))
        return array_merge($array, array_fill(0, $newSize - $currentSize, 00));
    } else {
        return $array;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arrayInput = $_POST['array'];
    $newSize = intval($_POST['new_size']);

    $array = array_map('trim', explode(',', $arrayInput));
    
    $resizedArray = resizeArray($array, $newSize);

    echo "Original Array: ";
    print_r($array);
    echo "<br>Resized Array: ";
    print_r($resizedArray);
}
?>
