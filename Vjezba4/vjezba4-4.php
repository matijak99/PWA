<?php

function prost($n) {
    if ($n <= 1) {
        return false;
    }

    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }

    return true;
}

for ($i = 2; $i < 100; $i++) {
    if (prost($i)) {
        echo $i . " ";
    }
}

?>