<?php

/**
 * Сокращает все множественные пробелы до одного
 * @param string $str
 * @param int $iter
 * @return string
 */
function nodoublespaces($str, $iter = 10)
{
	for ($i = 0; $i < $iter; $i++)
	{
		$str = str_replace("  ", " ", $str);
	}
	return $str;
}