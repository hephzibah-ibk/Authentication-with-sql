<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'dblogin');

	// initialize variables
	$course = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$course = $_POST['course'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (course, address) VALUES ('$course', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index4.php');
	}
	if (isset($_POST['update'])) {
	    $id = $_POST['id'];
	    $name = $_POST['course'];
	    $address = $_POST['address'];
	    
	    mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
	    $_SESSION['message'] = "Address updated!";
	    header('location: index4.php');
	}
	if (isset($_GET['del'])) {
	    $id = $_GET['del'];
	    mysqli_query($db, "DELETE FROM info WHERE id=$id");
	    $_SESSION['message'] = "Address deleted!";
	    header('location: index4.php');
	}
?>