<?php
    $arr = [12, 9, 30, "A", "M", 99, 82, "J", "N", "B"];

    usort($arr, function($a, $b) {
        if (is_numeric($a) && is_string($b)) {
            return 1;
        }
        if (is_string($a) && is_numeric($b)) {
            return -1;
        }
        if (is_string($a) && is_string($b)) {
            return strcmp($a, $b);
        }
        return $a - $b;
    });

    $result = [];
    foreach ($arr as $value) {
        if (is_string($value)) {
            $result[] = "'$value'";
        } else {
            $result[] = $value;
        }
    }

    echo "[" . implode(", ", $result) . "]";
?>
