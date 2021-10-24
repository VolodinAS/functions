<?php

/**
 * Получить длинное название дня недели по unix
 * @param int $time
 * @return string
 */
function getDayRus($time = 0)
{
	if ($time == 0) $time = time();
	$days = array(
		'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
		'Четверг', 'Пятница', 'Суббота'
	);
	return $days[(date('w', $time))];
}