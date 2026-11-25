<?php
$name=$address=$consumer=$due=$discon="";
$total=$units=$energy=0;
if(isset($_POST['generate'])){
$name=htmlspecialchars($_POST['name']);
$address=htmlspecialchars($_POST['address']);
$consumer=htmlspecialchars($_POST['consumer']);
$due=$_POST['due'];
$discon=$_POST['discon'];
$units=max(0,(int)$_POST['current']-(int)$_POST['previous']);
$slabs=[[50,3.25],[50,4.05],[50,5.10],[50,7],[100,8],[PHP_INT_MAX,9]];
$remaining=$units;
foreach($slabs as [$limit,$rate]){
$used=min($remaining,$limit);
$energy+=$used*$rate;
$remaining-=$used;
if($remaining<=0)break;
}
$fixed=40;
$duty=$energy*0.10;
$total=$energy+$fixed+$duty;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Electricity Bill</title>
<style>
body{
font-family:Arial;
background:#eee;
padding:20px}
.box{
background:white;
max-width:600px;
margin:auto;
padding:20px;
border:1px solid #333}
input,textarea,button{
width:100%;
padding:10px;
margin:7px 0;
box-sizing:border-box}
table{
width:100%;border-collapse:
collapse;margin:15px 0}
td{border:1px solid #777;padding:10px}
h2,h3{text-align:center;color:green}
@media print{.no-print{display:none}}
</style>
</head>
<body>
<div class="box">
<h2>KSEB ELECTRICITY BILL</h2>
<form method="post" class="no-print">
<input name="name" placeholder="Consumer Name" required>
<textarea name="address" placeholder="Address" required></textarea>
<input name="consumer" placeholder="Consumer Number" required>
<label>Due Date</label><input type="date" name="due" required>
<label>Disconnection Date</label><input type="date" name="discon" required>
<input type="number" name="previous" placeholder="Previous Reading" min="0" required>
<input type="number" name="current" placeholder="Current Reading" min="0" required>
<button name="generate">Generate Bill</button>
</form>
<?php if(isset($_POST['generate'])){ ?>
<p><b>Sample bill - Not an official KSEB bill</b></p>
<table>
<tr><td>Name</td><td><?=$name?></td></tr>
<tr><td>Address</td><td><?=$address?></td></tr>
<tr><td>Consumer No</td><td><?=$consumer?></td></tr>
<tr><td>Due Date</td><td><?=$due?></td></tr>
<tr><td>Disconnection Date</td><td><?=$discon?></td></tr>
<tr><td>Units Consumed</td><td><?=$units?> kWh</td></tr>
<tr><td>Energy Charge</td><td>₹<?=number_format($energy,2)?></td></tr>
<tr><td>Fixed Charge</td><td>₹<?=number_format($fixed,2)?></td></tr>
<tr><td>Duty</td><td>₹<?=number_format($duty,2)?></td></tr>
<tr><td><b>Total Amount</b></td><td><b>₹<?=number_format($total,2)?></b></td></tr>
</table>
<a href="https://wss.kseb.in/selfservices/" target="_blank">Pay Online</a>
<button class="no-print" onclick="window.print()">Print Bill</button>
<?php } ?>
</div>
</body>
</html>

