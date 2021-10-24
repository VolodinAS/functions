<?php
/**
 * Преобразует массив в JavaScript-адаптированный массив
 * @param array $array
 * @return string
 */
function js_array($array)
{
	$temp = array_map('js_str', $array);
	return '[' . implode(',', $temp) . ']';
}