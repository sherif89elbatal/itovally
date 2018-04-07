<?php
require 'includes/helper.php';

$rules = [

'first_name' => 'required|string|min:3|max:50',
'last_name'  => 'required|string|min:3|max:50',
'email'      => 'required|string|min:3|max:50|email|unique:users,email',
'password'   => 'required|string|min:3|max:100',
'phone'      => 'required|string|min:10|max:30',
'location'   => 'required|string|min:3|max:30',
'gender'     => 'required|string|in:male,female',

];

$errors = validator($_POST, $rules);

if(count($errors) == 0 ){
	create('users', $_POST);
	redirect("index.php");
}else{
	$_SESSION['errors'] = $errors;
	redirect('register.php');
}

?>