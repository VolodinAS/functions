<?php
/**
 * Замена пробелов на неразрывный пробел
 * @param string $str
 * @return string
 */
function nbsper($str)
{
	$str = nodoublespaces($str);
	$str = str_replace(" ", "&nbsp;", $str);
	return $str;
}