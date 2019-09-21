<?php
include('functions.php');


$url = 'data.json'; //url to json file
$data = file_get_contents($url);
$users = json_decode($data, true); //stores the content of the JSON file as an array in a variable
$email = $password = "";
//LOGIN BLOCK
//validate login details from form
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
	$email = $password = "";
	$email = test_input($_POST['email']);
	$pass = test_input($_POST['password']);
	$password = md5($pass);
	$_SESSION['msg'] = "";

	//loops through the array of users for matching username and password
	foreach ($users as $user) {
		if($email === $user['email'] && $password === $user['password']){
			
			$_SESSION['user'] = $user['email'];
			header('location:../welcome.php');
			exit;
		}
	}
	$_SESSION['msg'] = '<p style="color:red;">Invalid Login details</p>';
	
	header('location:../index.php');
	exit;
}

//REGISTER BLOCK
//Appends new user details to the data.json file
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup"])) {

	$email = $password1 = $password2 = "";
	//sanitize user inputs for mysql injections
	$email = test_input($_POST['email']);
	$password1 = test_input($_POST['password1']);
	$password2 = test_input($_POST['password2']);

	if($password1 === $password2){
		foreach ($users as $user) {
			if($email === $user['email']){
				$_SESSION['msg'] = '<p style="color:red;">Sorry, An account with that email already exists</p>';
				header('location:../signup.php');
				exit;
			}
		}
		
		$formdata = array(
			'email'=> $email,
			'password'=> md5($password1)
		);
	
		array_push($users, $formdata);
		$jsonData = json_encode($users);
		if(file_put_contents('data.json', $jsonData)){
			$_SESSION['msg'] = '<p style="color:green;">Account created successfully, pls login with your details</p>';
			header('location:../index.php');
			exit;
		};
	}else{
		$_SESSION['msg'] = '<p style="color:red;">passwords do not match</p>';
	
		header('location:../signup.php');
	exit;
	}
	

}
?>