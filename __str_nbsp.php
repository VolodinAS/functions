<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__str_nbsp.php
 */


/**
 * Окружает строку num количеством nbsp;
 * @param string $str
 * @param int $num
 * @return string
 */
function str_nbsp($str, $num = 0)
{
	$nbb = '';
	$nba = '';
	for ($i = 0; $i < $num; $i++)
	{
		if ($nbb == '') $nbb = "&nbsp;";
		else $nbb .= "&nbsp;";
		
		if ($nba == '') $nba = "&nbsp;";
		else $nba .= "&nbsp;";
	}
	return $nbb . $str . $nba;
}