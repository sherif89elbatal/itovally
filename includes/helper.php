<?php
session_start();

function query($sql){
	$con = mysqli_connect('localhost','root','','elbatal');

	if (mysqli_connect_error()) {
		echo "connection failed : " . mysqli_connect_error();
		die();
	}

	$res = mysqli_query($con, $sql);

	if (mysqli_error($con)) {
		echo "Mysqli error with sql : " . $sql . " with error : " . mysqli_error($con);
		die();
	}
	return $res;
}


function fetch($sql){
	$x = query($sql);

	$num = mysqli_num_rows($x);

	$data = [];

	for ($i=0; $i < $num; $i++) { 
		$data[] = mysqli_fetch_assoc($x);
	}

	return $data;
}


function all($table){
	return fetch("SELECT * FROM {$table}");
}

function create($table, $x){

	$columns = implode(',', array_keys($x));
	$values  = implode("','", array_values($x));

	query("INSERT INTO {$table} ({$columns}) VALUES('{$values}')");
}


// create('users', $_GET);

//query("INSERT INTO users(first_name,last_name) VALUES('sarah','tarek')");

function find($table, $id){
	$res = query("SELECT * FROM {$table} WHERE id = {$id} LIMIT 1");
	return mysqli_fetch_assoc($res);
}

function first($sql){
	$res = query($sql);
	return mysqli_fetch_assoc($res);
}

// $row = find('users', 234);

// if ($row) {
// 	echo $row['email'];
// }


function redirect($path){
	header("Location: {$path}");
	exit();
}

function validator($data, $rules){
	$errors = [];

	foreach ($rules as $k => $v) {

		$v = explode('|', $v);

		if (in_array('required', $v) && !isset($data[$k]) ){
			$errors[] = $k.' field is required.';
		}

		if (in_array('required', $v) && empty($data[$k]) ){
			$errors[] = $k.' field has not a value.';
		}

		if ( !empty($data[$k]) ) {
			foreach ($v as $x => $y) {

				if ($y == 'string' && !is_string($data[$k]) ){
					$errors[] = $k.' field must be a .';
				}
				
				if ($y == 'number' && !is_numeric($data[$k]) ){
					$errors[] = $k.' field must be a number.';
				}

				if ($y == 'array' && !is_array($data[$k]) ){
					$errors[] = $k.' field must be an array.';
				}

				if ($y == 'email' && !filter_var($data[$k], FILTER_VALIDATE_EMAIL) ){
					$errors[] = $k.' field must be a valid email.';
				}

				if ($y == 'confirmed' && !isset($data[ "{$k}_confirmarion" ]) ){
					$errors[] = $k.' field must be confirmed.';
				}

				if ($y == 'confirmed' && !empty($data[ "{$k}_confirmarion" ]) && $data[$k] != $data["{$k}_confirmarion"]){
					$errors[]=$k." field confirmation doesn't match.";
				}

				if (substr($y,0,3) == 'max'){

					$length = substr($y,4);

					if( strlen($data[$k]) > $length){
						$errors[] = $k.' field must not bigger than '.$length;
					}
				}

				if (substr($y,0,3) == 'min'){

					$length = substr($y,4);

					if( strlen($data[$k]) < $length){
						$errors[] = $k.' field must not less than '.$length;
					}
				}

				if (substr($y ,0 ,6) == 'unique'){
					$t = explode( ',', substr($y, 7) );
	
					if(empty($t[0]) || empty($t[1])){
						throw new Exception("Your Unique parameters is not valid");
					}
					$exist = fetch("SELECT * FROM {$t[0]} WHERE $t[1]='{$data[$k]}' LIMIT 1");

					if ($exist) {
						$errors[] = $data[$k].' has been taken.';
					}					
				}

				if (substr($y, 0, 6) == 'exists'){
					$t = explode( ',', substr($y, 7) );
	
					if(empty($t[0]) || empty($t[1])){
						throw new Exception("Your Exists parameters is not valid");
					}
					$exist = fetch("SELECT * FROM {$t[0]} WHERE $t[1]='{$data[$k]}' LIMIT 1");

					if (!$exist) {
						$errors[] = $data[$k]." doesn't match our records.";
					}					
				}
			}
		}
	}
	return $errors;
}


$auth = false;

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	$auth = $_SESSION['user'];
}
