<?php
/**
 * Делает заглавные буквы каждого слова
 * @param string $str
 * @return string
 */
function mb_ucwords($str)
{
	$str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
	return ($str);
}