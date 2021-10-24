<?php
/**
 * Получить короткое название дня недели по unix
 * @param int $time
 * @return string
 */
function getDayRusShort($time = 0)
{
	if ($time == 0) $time = time();
	$days = array(
		'Вс', 'Пн', 'Вт', 'Ср',
		'Чт', 'Пт', 'Сб'
	);
	return $days[(date('w', $time))];
}