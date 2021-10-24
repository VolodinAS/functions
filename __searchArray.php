<?php

/**
 * Поиск по двумерному массиву stack в поле field значения needle
 * @param array $stack
 * @param string $field
 * @param void $needle
 * @return array
 */
function searchArray($stack, $field, $needle)
{
	$arr = array();
	$key = array_search($needle, array_column($stack, $field));
	
	$arr['params'] = array(
		'stack' => $stack,
		'field' => $field,
		'needle' => $needle
	);
	if ($key !== false)
	{
		$arr['results']['status'] = "success";
		$arr['results']['key'] = $key;
		$arr['results']['data'] = $stack[$key];
	} else
	{
		$arr['results']['status'] = "fail";
		$arr['results']['key'] = $key;
	}
	
	return $arr;
}