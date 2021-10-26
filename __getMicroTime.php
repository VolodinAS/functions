<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__getMicroTime.php
 */


/**
 * Получаем метку времени с микросекундами
 * @param int $tp
 * @return float|string
 */
function getMicroTime($tp=0)
{
	list($usec, $sec) = explode(" ", microtime());
	if ( $tp == 0 ) return ((float)$usec + (float)$sec);
	else
	{
		$usec_data = explode("." , $usec);
		return date( "d.m.Y H:i:s", $sec ) . ':' . $usec[1];
	}
}