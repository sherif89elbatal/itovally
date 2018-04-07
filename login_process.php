<?php

require 'includes/helper.php';

$rules =[
	'email' => 'required|string|min:10|max:100|email|exists:users,email',
	'password' => 'required|string|min:3|max:60',
];

$errors = validator($_POST,$rules);

if(count($errors) == 0) {
	$user = first("SELECT * FROM users WHERE email = '{$_POST['email']}' LIMIT 1");

	if($_POST['password'] == $user['password']){

		$_SESSION['user'] = $user ;
		redirect('index.php');

	}else{
		$_SESSION['error'] = "Sorry your password is not Correct! " ;
		redirect('login.php');

	}


}else{
	$_SESSION['errors'] = $errors ;
	redirect ('login.php');
}


?>