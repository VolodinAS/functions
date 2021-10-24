<?php
/**
 * Ставит num неразрывных пробелов
 * @param int $num
 * @return string
 */
function _nbsp($num = 3)
{
	$str = "";
	for ($i = 0; $i < $num; $i++)
	{
		$str .= "&nbsp;";
	}
	return $str;
}