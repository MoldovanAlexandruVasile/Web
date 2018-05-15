<?php 
    session_start();
	$db = mysqli_connect('localhost', 'root', '', 'Collection');
	// initialize variables
	$URL = "";
    $Description = "";
    $Category = "";
	$update = false;

	if (isset($_POST['save'])) {
		$URL = $_POST['URL'];
        $Description = $_POST['Description'];
        $Category = $_POST['Category'];

		mysqli_query($db, "INSERT INTO weblinks (URL, Description, Category) VALUES ('$URL', '$Description', '$Category')"); 
		$_SESSION['message'] = "Link saved"; 
		header('location: index.php');
    }

    if (isset($_POST['update'])) {
        $id = $_POST['ID'];
        $URL = $_POST['URL'];
        $Description = $_POST['Description'];
        $Category = $_POST['Category'];
    
        mysqli_query($db, "UPDATE weblinks SET URL='$URL', Description='$Description', Category='$Category' WHERE ID=$id");
        $_SESSION['message'] = "Address updated!"; 
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM weblinks WHERE ID=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: index.php');
    }
?>