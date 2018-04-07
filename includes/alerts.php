<?php

if(isset($_SESSION['errors'])){
?>
<div class="alert alert-danger">
	<?php
	foreach ($_SESSION['errors'] as $key => $error) {
		echo "<div> {$error} </div>";
	}
	unset($_SESSION['errors']);
	?>
</div>

<?php
}
?>

<?php
if (isset($_SESSION['success'])) {
	echo "<div class ='alert alert-success'>";
	echo $_SESSION['success'];
	echo "</div>";
	unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
	echo"<div class = 'alert alert-danger'>";
	echo $_SESSION['error'];
	echo "</div>";
	unset($_SESSION["error"]);
}

?>
