<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__getCurrentDay.php
 */


/**
 * Получает данные о времени по указанному unix
 * @param int $time
 * @return array
 */
function getCurrentDay($time)
{
	$response = array();
	$response['year'] = date("Y", $time);
	$response['month'] = date("m", $time);
	$response['day'] = date("d", $time);
	$response['hour'] = date("H", $time);
	$response['minute'] = date("i", $time);
	$response['second'] = date("s", $time);
	$response['week_long'] = getDayRus($time);
	$response['week_short'] = getDayRusShort($time);
	$today_string = $response['year'] . '-' . $response['month'] . '-' . $response['day'];
	$timestamp_today = strtotime($today_string);
	$response['unix'] = $timestamp_today;
	$response['full_unix'] = $time;
	
	$day_start_date = date('Y-m-d 00:00:00', $timestamp_today);
	$day_end_date = date('Y-m-d 23:59:59', $timestamp_today);
	
	$day_start = strtotime($day_start_date);
	$day_end = strtotime($day_end_date);
	
	$week_start = date('Y-m-d', strtotime('last monday', strtotime('tomorrow')));
	$week_end = date('Y-m-d', strtotime('this sunday'));
	
	$month_start = date("Y-m-1", strtotime("first day of this month"));
	$month_end = date("Y-m-t", strtotime("last day of this month"));
	
	$year_start = date("Y-m-d", strtotime("first day of january this year"));
	$year_end = date("Y-m-d", strtotime("last day of december this year"));
	
	$week_start_unix = date('Y-m-d', strtotime('last monday', strtotime('tomorrow', $timestamp_today)));
	$week_end_unix = date('Y-m-d', strtotime('this sunday', $timestamp_today));
	
	$month_start_unix = date("Y-m-01", strtotime("first day of this month", $timestamp_today));
	$month_end_unix = date("Y-m-t", strtotime("last day of this month", $timestamp_today));
	
	$year_start_unix = date("Y-m-d", strtotime("first day of january this year", $timestamp_today));
	$year_end_unix = date("Y-m-d", strtotime("last day of december this year", $timestamp_today));
	
	$response['begins'] = array(
		'week' => array(
			'date' => $week_start,
			'unix' => strtotime($week_start)
		),
		'month' => array(
			'date' => $month_start,
			'unix' => strtotime($month_start)
		),
		'year' => array(
			'date' => $year_start,
			'unix' => strtotime($year_start)
		)
	);
	$response['ends'] = array(
		'week' => array(
			'date' => $week_end,
			'unix' => strtotime($week_end) + 86399
		),
		'month' => array(
			'date' => $month_end,
			'unix' => strtotime($month_end) + 86399
		),
		'year' => array(
			'date' => $year_end,
			'unix' => strtotime($year_end) + 86399
		)
	);
	
	$response['by_timestamp']['begins'] = array(
		'day' => array(
			'date' => date('Y-m-d H:i:s', $day_start),
			'unix' => $day_start
		),
		'week' => array(
			'date' => $week_start_unix,
			'unix' => strtotime($week_start_unix)
		),
		'month' => array(
			'date' => $month_start_unix,
			'unix' => strtotime($month_start_unix)
		),
		'year' => array(
			'date' => $year_start_unix,
			'unix' => strtotime($year_start_unix)
		)
	);
	$response['by_timestamp']['ends'] = array(
		'day' => array(
			'date' => date('Y-m-d H:i:s', $day_end),
			'unix' => $day_end
		),
		'week' => array(
			'date' => $week_end_unix,
			'unix' => strtotime($week_end_unix) + 86399
		),
		'month' => array(
			'date' => $month_end_unix,
			'unix' => strtotime($month_end_unix) + 86399
		),
		'year' => array(
			'date' => $year_end_unix,
			'unix' => strtotime($year_end_unix) + 86399
		)
	);
	
	$response['format'] = array(
		'dd.mm.yyyy' => $response['day'] . '.' . $response['month'] . '.' . $response['year'],
		'dd.mm.yyyy hh:mm:ss' => $response['day'] . '.' . $response['month'] . '.' . $response['year'] . ' ' . $response['hour'] . ':' . $response['minute'] . ':' . $response['second']
	);
	return $response;
}