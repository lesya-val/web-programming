<?php

$link = mysqli_connect('localhost', 'root', '', 'audiodepo');

if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM alboms";
$result = mysqli_query($link, $query);

if (!$result) {
	die("Query failed: " . mysqli_error($link));
}

$alboms = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($link);

function formatTime($time)
{
	$timeParts = explode(':', $time);
	$minutes = $timeParts[1];
	$seconds = $timeParts[2];
	return $minutes . ':' . $seconds;
}

?>