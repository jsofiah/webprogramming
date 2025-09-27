<?php
    $loremIpsum = "Lorem duis laborum id ad. Proident aliquip sit tempor laboris excepteur ut. Est amet amet laborum et et labore. Id cillum sit pariatur nisi velit dolore.";
    
    echo "<p>{$loremIpsum}</p>";
    echo "Panjang karakter: " . strlen($loremIpsum) . "<br>";
    echo "Panjang kata: " . str_word_count($loremIpsum) . "<br>";
    echo "<p>" . strtoupper($loremIpsum) . "</p>";
    echo "<p>" . strtolower($loremIpsum) . "</p>";
?>