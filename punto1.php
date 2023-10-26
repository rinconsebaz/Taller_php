<!DOCTYPE html>


<?php
function solve($nums) {
    sort($nums);

    $pares = array_filter($nums, function($num) {
        return $num % 2 == 0;
    });

    rsort($pares);

    $impares = array_filter($nums, function($num) {
        return $num % 2 != 0;
    });

    sort($impares);

    return array($nums, $pares, $impares);
}

$nums = array(4, 2, 9, 6, 5, 3, 8, 1, 7);
list($sorted_nums, $sorted_pares, $sorted_impares) = solve($nums);

echo "Números ordenados de menor a mayor: ";
print_r($sorted_nums);

echo "Números pares ordenados de mayor a menor: ";
print_r($sorted_pares);

echo "Números impares ordenados de menor a mayor: ";
print_r($sorted_impares);
?>

</html>