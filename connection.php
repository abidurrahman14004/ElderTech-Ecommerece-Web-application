<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "registration";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	echo"
	<script>
	alert('failed to connect!');
	</script>
	";
}

?>