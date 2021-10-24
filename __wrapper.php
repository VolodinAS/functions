<?php
/**
 * Обвернуть строку в тег (просто)
 * @param string $str
 * @param string $tag
 * @return string
 */
function wrapper($str, $tag = 'b')
{
	return '<' . $tag . '>' . $str . '</' . $tag . '>';
}