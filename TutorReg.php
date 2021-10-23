<?php
session_start();
?>

<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = $genderErr = $phoneErr = $userNameErr = $yearErr = $edubErr = $addErr = $passErr = $confirmpassErr =  "";
$username = $password = $name = $email = $gender = $address = $phone = $yearex = $edubag = $confirmpass = "";
$message = '';  
$error = ''; 

// NAME
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr = "Only letters white space, period & dash allowed";
      $name ="";
      
    }
    else if (str_word_count($name)<2) {
      $nameErr = "At least two words needed";
      $name ="";
       
    }
  }
//   USERNAME
  if (empty($_POST["username"])) {
    $userNameErr = "UserName is required";
    
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
      $username ="";
       
    }
    else if (strlen($username)<2) {
      $userNameErr = "At least two charecters needed";
      $username ="";
       
    }
  }  

//   EMAIL
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
     
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email ="";
       
    }
  }
//   PHONE
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone no required";
     
  } else {
    $phone = test_input($_POST["phone"]);
  }

//   GENDER
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
     
  } else {
    $gender = test_input($_POST["gender"]);
  }
//   Address
   if (empty($_POST["address"])) {
    $addErr = "Address is required";
     
  } else {
    $address = test_input($_POST["address"]);
  }
//   Educational Background
    if (empty($_POST["educational"])) {
    $edubErr = "Educational Background is required";
     
  } else {
    $edubag = test_input($_POST["educational"]);
  }
//Year of teaching experience
    if (empty($_POST["yearex"])) {
    $yearErr = "Year of teaching experience is required";
     
  } else {
    $yearex = test_input($_POST["yearex"]);
  }
//   PASSWORD
  if (empty($_POST["Password"])) {
    $passErr = "Password is required";
     
  } else {
    $password = test_input($_POST["Password"]);
    if (strlen($password)<8) {
      $passErr = "Password must be 8 charecters";
      $password ="";
       
    }
    else if (!preg_match("/[a-zA-Z0-9]*@/",$password)) {
      $passErr = "Password must contain characters,number and @";
      $password ="";
       
    }
  }
  if (empty($_POST["confirmpass"])) {
    $confirmpassErr = "Retype The Current Password";
     
  } else {
    $confirmpass = test_input($_POST["confirmpass"]);
    if ($password != $confirmpass) {
      $confirmpassErr = "Password & Retyped Password Dosen't Match";
      $confirmpass ="";
       
    }
  } 
  
 	if(isset($_POST["submit"]))  
    {
 	if(file_exists('data.json'))
 		{
 			$current_data = file_get_contents('data.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(
                'name'       =>     $_POST['name'],
                'email'      =>     $_POST["email"],
				'phone'      =>     $_POST['phone'],
                'username'   =>     $_POST["username"],
                'password'   =>     $_POST["confirmpass"],  
                'gender'     =>     $_POST["gender"],
				'address'    =>     $_POST["address"],
				'educational'    =>     $_POST['educational'],
				'yearex'    =>     $_POST['yearex'],
                );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('data.json', $final_data))  
            {  
                 $message = "<label>Data Recorded Successfully</p>";  
            }  
        }  
        else  
        {  
           $error = 'JSON File not exits';  
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
  <fieldset >
<legend>REGISTRATION:</legend>  
  Name: <input type="text" name="name">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><hr>
  User Name: <input type="text" name="username">
  <span class="error"> <?php echo $userNameErr;?></span>
  <br><hr>
  Password: <input type="Password" name="Password">
  <span class="error"> <?php echo $passErr;?></span>
  <br><hr>
  Confirm Password: <input type="Password" name="confirmpass">
  <span class="error"> <?php echo $confirmpassErr;?></span>
  <br><hr>
  E-mail: <input type="text" name="email">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><hr>
  Phone :  </label>  
  <input type="text" name="phone" size="11"/> <br> <br> 
  <fieldset>
  <legend>Gender</legend>
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error"> <?php echo $genderErr;?></span>
  </fieldset> 
  <br><hr>  
  Educational Background : <input type="text" name="educational">
  <span class="error"> <?php echo $edubErr;?></span>
  <br><hr>  
  
  Year of teaching experience :  <input type="text" name="yearex">
  <span class="error"> <?php echo $yearErr;?></span>
  <br><hr>  
  Address : <input type="text" name="address">
  <span class="error"> <?php echo $addErr;?></span>
  <br><hr>  
  <hr>
  <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset">  </fieldset>
</form>
<?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
</body>
</html>