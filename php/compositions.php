<?php

$link = mysqli_connect('localhost', 'root', '', 'audiodepo');

if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM compositions";
$result = mysqli_query($link, $query);

if (!$result) {
	die("Query failed: " . mysqli_error($link));
}

$compositions = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($link);
