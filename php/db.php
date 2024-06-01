<?php

$conn = mysqli_connect('localhost', 'root', '', 'audiodepo');

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>