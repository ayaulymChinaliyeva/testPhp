<!---developed by Ayaulym Chinaliyeva--->
<?php  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$login = $_POST['login'];
$password = $_REQUEST['password'];
$password1 = $_REQUEST['password1'];
$spec = $_POST['select'];
$cat = " ";
$category = $_POST['radio1'];

if ($password!=$password1) {
	echo "Passwords don't match";
	$conn->close();
	}

if (strlen($password)<8) {
	echo "Passwords should be 8 or more symbols";
	$conn->close();
	}

if ($category==="teacher") {
	$cat = "Teacher";
}
elseif ($category==="student") {
	$cat = "Student";	
}
elseif ($category==="parent") {
	$cat = "Parent";
}

$sql = "INSERT INTO `test`.`test` (`Name`, `Login`, `Password`, `Password1`, `Category`, `Spec`) VALUES ('$name', '$login', '$password', '$password1', '$cat', '$spec');";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Password1 is ".$password." and Password2 is ".$password1;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>