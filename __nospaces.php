<?php

/**
 * Удаляет все пробелы из строки
 * @param string $str строка
 * @param int $iter количество итераций
 * @return string
 */
function nospaces($str, $iter = 10)
{
	$str = nodoublespaces($str);
	for ($i = 0; $i < $iter; $i++)
	{
		$str = str_replace(" ", "", $str);
	}
	
	return $str;
}