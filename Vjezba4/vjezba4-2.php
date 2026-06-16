<?php

function ducan($stanje = "otvoren")
{
    echo "Dućan je $stanje";
}

$sat = date("G");
$dan = date("N");

if ($dan == 7) {
    ducan("zatvoren");
}
elseif ($dan == 6) {
    if ($sat >= 9 && $sat < 14) {
        ducan("otvoren");
    } else {
        ducan("zatvoren");
    }
}
else {
    if ($sat >= 8 && $sat < 20) {
        ducan("otvoren");
    } else {
        ducan("zatvoren");
    }
}

echo "<br>";
echo "Trenutni dan: " . date("l");
echo "<br>";
echo "Trenutni sat: " . $sat;

?>