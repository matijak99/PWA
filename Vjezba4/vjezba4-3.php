<?php 

echo "<form method='get'>
    <input type='text' name='text'>
    <input type='submit' name='submit'>
</form>";

if(isset($_GET['submit'])) {
    echo "Ulazni niz: {$_GET['text']} <br> sadrži " . str_word_count($_GET['text']) . " riječ/i";
}

?>