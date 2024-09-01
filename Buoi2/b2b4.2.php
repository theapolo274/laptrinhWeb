<?php
function findMax($array) {
    return max($array);
}

function findMin($array) {
    return min($array);
}

function calculateSum($array) {
    return array_sum($array);
}

function isValueInArray($array, $value) {
    return in_array($value, $array);
}

function sortArray($array) {
    sort($array);
    return $array;
}
?>
