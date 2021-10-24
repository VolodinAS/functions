<?php
/**
 * Получить длинное название дня недели по индексу
 * @param int $index
 * @return string
 */
function getDayRusByIndex($index)
{
	$days = array(
		'Понедельник', 'Вторник', 'Среда',
		'Четверг', 'Пятница', 'Суббота', 'Воскресенье'
	);
	return $days[$index - 1];
}