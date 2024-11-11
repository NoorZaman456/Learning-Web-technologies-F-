<?php
function searchElement($array, $element) {
    foreach ($array as $item) {
        if ($item == $element) {  
            echo "Element '$element' found in the array.";
            return;
        }
    }
    echo "Element '$element' not found in the array.";
}
$array = [5, 10, 15, 20, 25, 30];
$elementToSearch = 28;
searchElement($array, $elementToSearch);
?>