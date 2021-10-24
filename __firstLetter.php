<?php
/**
 * Найти первую букву строки
 * @param string $str
 * @return string
 */
function firstLetter($str)
{
	return mb_substr($str, 0, 1, 'UTF-8');
}