<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__ClearIt.php
 */


/**
 * Похожа на nodoublespaces, только очищает от любых дублирующих функций, указанных в fromWhat
 * @param string $str строка
 * @param string $fromWhat от чьих дублей очистить
 * @return string
 */
function ClearIt($str, $fromWhat)
{
	$doubleFromWhat = $fromWhat . $fromWhat;
	for ($i = 0; $i < 20; $i++)
	{
		$str = str_replace($doubleFromWhat, $fromWhat, $str);
	}
	return $str;
}