<?php
$msg = "";
if(isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $qualification = $_POST['qualification'] ?? "";
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];
    if(empty($name) || !preg_match("/^[a-zA-Z ]+$/", $name))
        $msg = "Invalid Name";
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $msg = "Invalid Email";
    elseif(!preg_match("/^[0-9]{10}$/", $mobile))
        $msg = "Invalid Mobile Number";
    elseif(empty($address))
        $msg = "Enter Address";
    elseif(!in_array($qualification, ["Plus Two", "Degree", "PG"], true))
        $msg = "Select Qualification";
    elseif(strlen($pass) < 8)
        $msg = "Password must contain 8 characters";
    elseif($pass !== $confirm)
        $msg = "Confirm Password is incorrect";
    else
        $msg = "Registration Successful!";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #74ebd5, #9face6);
}
form {
    background: white;
    width: 300px;
    margin: 50px auto;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}
input, select, textarea {
    width: 100%;
    padding: 9px;
    margin: 8px 0;
    box-sizing: border-box;
}

button {
    background: blue;
    color: white;
    padding: 10px;
    width: 100%;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
}
p {
    text-align: center;
    color: red;
}
</style>
</head>
<body>
<form method="post">
<h2 align="center">Registration Form</h2>
<input type="text" name="name" placeholder="Enter Name" required>
<input type="email" name="email" placeholder="Enter Email" required>
<input type="text" name="mobile" placeholder="Mobile Number" required>
<textarea name="address" placeholder="Enter Address" required></textarea>
<select name="qualification" required>
<option value="">Select Qualification</option>
<option value="Plus Two">Plus Two</option>
<option value="Degree">Degree</option>
<option value="PG">PG</option>
</select>
<input type="password" name="password" placeholder="Password" required>
<input type="password" name="confirm" placeholder="Confirm Password" required>
<button type="submit" name="register">Register</button>
<?php
if($msg != "") {
    echo "<p>" . htmlspecialchars($msg) . "</p>";
}
?>
</form>
</body>
</html>

