<!DOCTYPE html>
<html>
<head>
<title>Indian Cricket Players</title>
<style>
body {
    font-family: Arial;
    background: #eaf2f8;
    text-align: center;
    padding: 20px;
}
h2 {
    color: #08783c;
}
.container {
    width: 350px;
    margin: auto;
}
.player {
    background: white;
    padding: 12px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 3px 6px #aaa;
    color: #333;
    font-size: 18px;
}
.player:hover {
    background: #c9daf8;
}
</style>
</head>
<body>
<h2>Indian Cricket Players</h2>
<div class="container">
<?php
$players = array(
"Virat Kohli",
"Rohit Sharma",
"MS Dhoni",
"Jasprit Bumrah",
"Hardik Pandya",
"Shubman Gill",
"KL Rahul",
"Ravindra Jadeja",
"Rishabh Pant",
"Suryakumar Yadav"
);
$i = 1;
foreach($players as $player) {
    echo "<div class='player'>$i. $player</div>";
    $i++;
}
?>
</div>
</body>
</html>

