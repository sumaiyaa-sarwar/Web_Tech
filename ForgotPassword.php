<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("data.json");
    $data = json_decode($data, true);
    foreach ($data as $row) {
        $email = $row['email'];
        $pass = $row['password'];
    }
    if ($_POST['email'] == $email) {
        $password = $pass;
    } else {
        $password = "Password not found";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <fieldset>
<legend><B>FORGOT PASSWORD</B></legend>  
  Enter Email: <input type="text" name="email">
  <span class="error"></span>
  <br><br> <hr>
  
  <input type="submit" name="submit" value="Submit">
   
</fieldset>

</form>
<p><b>Your Result:</b></p>
<?php
if (!empty($password)) {
    echo $password;
    echo "<br>";
}
?>
</body>
</html>