<?php 

$cars = array("Audi", "BMW", "Renault", "Citroen");

echo "<form method='get'>
Označi vozilo<br>";

foreach($cars as $car) {
    echo "<input type='radio' name='auto' value='$car'>$car<br>";
}
echo "<input type='submit' name='submit'>
    </form>";

if(isset($_GET['submit'])) {
    echo "Odabrali ste " . $_GET['auto'];
}

?>