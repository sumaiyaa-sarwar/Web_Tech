<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$userNameErr = $passErr = "";
$username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $userNameErr = "UserName is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
      $username ="";
    }
    else if (strlen($username)<2) {
      $userNameErr = "Must contain at least two characters";
      $username ="";
    }
  }
  
  if (empty($_POST["Password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["Password"]);
    if (strlen($password)<8) {
      $passErr = "Password must be 8 charecters";
      $password ="";
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) {
      $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
      $password ="";
    }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <fieldset>
   <legend>LOGIN</legend>
  User Name: <input type="text" name="username">
  <span class="error"> <?php echo $userNameErr;?></span>
  <br><br>
  Password: <input type="Password" name="Password">
  <span class="error"> <?php echo $passErr;?></span>
  <br><br>
  <input type="checkbox" name="remember"> Remember me <br>
  <hr>
  <input type="submit" name="submit" value="Submit">
  <a href="ForgotPassword.php">Forgot Password?</a>
  </fieldset>

</form>
<p><b>Your Result:</b></p>
<?php
echo $username;
echo "<br>";
echo $password;
echo "<br>";
?>
</body>
</html>