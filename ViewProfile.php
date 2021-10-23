<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body style="border: 5px solid black;">
<?php 
session_start();
	echo "<div>";include 'header.php';echo "</div>";

 ?>
<table style="width:100%; border:3px solid black;">
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;">
    	Account<hr>
    	<div style="float: left; text-align: left;">
    	* <a href="ViewOffers.php">View Offers</a><br><br>
		* <a href="applyTu.php">Apply for a tuition</a><br><br>
		* <a href="appliSt.php">Check Application status</a><br><br>
    	* <a href="manageMail.php">Manage Mail</a><br><br>
    	* <a href="EditProfile.php">Edit Profile</a><br><br>
    	* <a href="changePass.php">Change Password</a><br><br>
    	* <a href="logout.php">Logout</a>
    </div>
    </th>
    <th><?php 
    $name=$email=$gender=$birthday=$propic= "";
    if(isset($_SESSION["uname"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = file_get_contents("data.json");
    $data = json_decode($data, true);
    foreach ($data as $row)
    {
        $name = $row['name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $dob = $row['birthday'];

    } }
 
    
	echo "<fieldset>
<legend><B>PROFILE</B></legend><div style= 'margin-right: 750px;float: left; text-align: left;color: green;'> Username: ".$_SESSION['uname']."<hr>
	<br>Name: ". $name."<hr>
	<br>Email: ". $email."<hr>
	<br>Gender: ". $gender."<hr>
	<br>Date Of Birth: ". $birthday."<hr>

	 </fieldset>"; }

?></th>
  </tr>
</table>

<div><?php include 'footer.php';?></div>
</body>
</html>