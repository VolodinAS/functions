<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__NormalizeNumber.php
 */


/**
 * Приводит строку к число, убирая вообще ВЕСЬ мусор, включая точки и запятые
 * @param $str
 * @return int
 */
function NormalizeNumber($str)
{
	return intval( trim(preg_replace("/[^0-9]/", '', $str)) );
}