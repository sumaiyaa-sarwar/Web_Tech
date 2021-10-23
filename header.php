<header>
<h1> <img src="OIP.jpg" width="100" height="100"> Tutor Hub </h1>

<?php
if (empty($_SESSION['uname'])) {
    echo "<div style='float: right';><a href='PublicHome.php'>Home</a> |";
    echo "<a href='Tutorlogin.php'>Login</a> |";
    echo "<a href='TutorReg.php'>Registration</a> </div><br><br><hr>";
} else {
    echo "<div style='float: right';>" . " Logged in as " . $_SESSION['uname'] . "</a> | ";
    echo "<a href='logout.php'>Logout</a><br>";
    echo "</div><br><br><br><br><hr>";
}
?>
	
</header>