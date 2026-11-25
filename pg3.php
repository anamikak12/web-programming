<?php
$students = array("Rahul", "Anu", "Vishnu", "Meera", "Arjun");
echo "Original Student Names:<br>";
print_r($students);
asort($students);
echo "<br><br>Ascending Order:<br>";
print_r($students);
arsort($students);
echo "<br><br>Descending Order:<br>";
print_r($students);
?>

