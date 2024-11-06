<?php
function formatTime($time)
{
	$timeParts = explode(':', $time);
	$minutes = $timeParts[1];  // Минуты из времени
	$seconds = $timeParts[2];  // Секунды из времени
	return $minutes . ':' . str_pad($seconds, 2, '0', STR_PAD_LEFT); // Добавляем ведущий ноль, если секунд меньше 10
}
