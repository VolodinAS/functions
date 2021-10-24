<?php
/**
 * Преобразовать строку в JavaScript-адаптированную строку
 * @param string $s
 * @return string
 */
function js_str($s)
{
	return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}
