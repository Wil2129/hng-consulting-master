<?php
include('functions.php');

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
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
        if ($email === $user['email'] && $password === $user['password']) {
            $_SESSION['user'] = $user['email'];
			if ($lang == 'fr') {
				header('location:../bienvenu.php');
			} else {
				header('location:../welcome.php');
			}
            exit;
        }
    }
    if ($lang == 'fr') {
		$_SESSION['msg'] = '<p style="color:red;">Informations de compte invalide</p>';
        header('location:../index_fr.php');
    } else {
		$_SESSION['msg'] = '<p style="color:red;">Invalid Login details</p>';
		header('location:../index.php');
	}
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

    if ($password1 === $password2) {
        foreach ($users as $user) {
            if ($email === $user['email']) {
				if ($lang == 'fr') {
					$_SESSION['msg'] = '<p style="color:red;">Désolé, un compte avec cet email existe déjà</p>';
					header('location:../enregistrer.php');
				} else {
					$_SESSION['msg'] = '<p style="color:red;">Sorry, An account with that email already exists</p>';
					header('location:../signup.php');
				}
                exit;
            }
        }
        
        $formdata = array(
            'email'=> $email,
            'password'=> md5($password1)
        );
    
        array_push($users, $formdata);
        $jsonData = json_encode($users);
        if (file_put_contents('data.json', $jsonData)) {
			if ($lang == 'fr') {
				$_SESSION['msg'] = '<p style="color:green;">Compte créé avec succès, veuillez vous connecter avec vos coordonnées</p>';
				header('location:../index_fr.php');
			} else {
				$_SESSION['msg'] = '<p style="color:green;">Account created successfully, pls login with your details</p>';
				header('location:../index.php');
			}
            exit;
        };
    } else {
		if ($lang == 'fr') {
			$_SESSION['msg'] = '<p style="color:red;">Les mots de passe ne correspondent pas</p>';
			header('location:../enregistrer.php');
		} else {
			$_SESSION['msg'] = '<p style="color:red;">passwords do not match</p>';
			header('location:../signup.php');
		}
        exit;
    }
}
