<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

// Verification infos du formulaire non vides
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {

	// Récupération des infos du formulaire
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (userConnection($db, $email, $password)) {
		header('Location: dashboard.php');
	}
	else {
		$error = "Mauvais identifiants";
	}
	
	/*userConnection
		return :
			true for connection OK
			false for fail
		$db -> 				database object
		$email -> 			field value : email
		$password -> 		field value : password
	*/
	
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';