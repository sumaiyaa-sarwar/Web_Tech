<?php  
if($_SERVER['REQUEST_METHOD'] === "POST"){
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname']; 
	$gen =  $_POST['gender'];
	$dob = $_POST['birthday'];
	$reli = $_POST['religion']; 
	$mail = $_POST['email'];
	$user = $_POST['username']; 
	$pass = $_POST['password']; 

	if (empty($fname)) {
				echo "First name missing. Please fill up the form properly";
			}
			else {
	echo "First Name: " . validate($_POST['firstname']); 
	echo "<br>";
	echo "<br>";
    }
    if (empty($lname)) {
				echo "Last name missing. Please fill up the form properly";
			}
			else {
	echo "Last Name: " . validate($_POST['lastname']);
	echo "<br>";
	echo "<br>";
	}
	if (empty($gen)) {
				echo "Gender missing. Please fill up the form properly";
			}
			else {
	echo "Gender: " . validate($_POST['gender']);
	echo "<br>";
	echo "<br>";
}
if (empty($dob)) {
				echo "Date of Birth missing. Please fill up the form properly";
			}
			else {
	echo "Date of Birth: " . validate($_POST['birthday']);
	echo "<br>";
	echo "<br>";
}
if (empty($reli)) {
				echo "Religion missing. Please fill up the form properly";
			}
			else {
	echo "Religion: " . validate($_POST['religion']);
	echo "<br>";
	echo "<br>";
}
	echo "<br>";
	echo "<br>";
    echo "Present Address: " . $_POST['presentaddress']; 
	echo "<br>";
	echo "<br>";
	echo "Permanent Address: " . $_POST['permanentaddress']; 
	echo "<br>";
	echo "<br>";
	echo "Phone: " . $_POST['phone']; 
	echo "<br>";
	echo "<br>";
	if (empty($mail)) {
				echo "Email missing. Please fill up the form properly";
			}
			else {
	echo "Email: " . validate($_POST['email']); 
	echo "<br>";
	echo "<br>";
}
	echo "Personal Website link: " . $_POST['website']; 
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	if (empty($user)) {
				echo "Username missing. Please fill up the form properly";
			}
			else {
	echo "Username: " . validate($_POST['username']); 
	echo "<br>";
	echo "<br>";
}
	if (empty($pass)) {
				echo "Password missing. Please fill up the form properly";
			}
			else {
	echo "Password: " . validate($_POST['password']); 
	echo "<br>";
	echo "<br>";
}
	echo "<br>";
	echo "<br>";
}

if (empty($user) or empty($pass)) {

} else {
   $user = validate($user);
   $pass = validate($pass);
    $handle = fopen("data.json", "a");
    $arr1 = array ('Username' => $user, 'Password' => $pass);
    $arr1 = json_encode($arr1);
    fwrite($handle, $arr1 . "\n");

}




function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
 ?>