<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__PeriodToSec.php
 */


/**
 * Конвертация заранее заданных периодов в секунды
 * @param int $period индекс из $Periods
 * @return array|bool
 */
function PeriodToSec($period)
{
	$Periods = array(
		'24h' => array(
			'title' => '24 часа',
			'interval' => TIME_DAY
		),
		'7d' => array(
			'title' => '7 дней',
			'interval' => 7 * TIME_DAY
		),
		'14d' => array(
			'title' => '14 дней',
			'interval' => 14 * TIME_DAY
		),
		'21d' => array(
			'title' => '21 день',
			'interval' => 21 * TIME_DAY
		),
		'30d' => array(
			'title' => '30 дней',
			'interval' => 30 * TIME_DAY
		),
		'3mon' => array(
			'title' => '3 месяца',
			'interval' => 90 * TIME_DAY
		),
		'6mon' => array(
			'title' => '6 месяцев',
			'interval' => 180 * TIME_DAY
		),
		'1y' => array(
			'title' => '1 год',
			'interval' => 365 * TIME_DAY
		)
	);
	$Data = $Periods[$period];
	if (count($Data) > 0)
	{
		return $Data;
	} else return false;
}