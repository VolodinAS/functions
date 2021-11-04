<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__pretty_print.php
 */


/**
 * Выводит массив в виде дерева
 *
 * @param mixed $in входные данные
 * @param string $narr название массива
 * @param bool $timestamp выводить время?
 * @param bool $opened открыть детали?
 * @return void
 */
function pretty_print($in, $narr=null, $timestamp=true, $opened = true)
{
	$arr_name = ( notnull($narr) ) ? '['.$narr.'] ' : '';
	$arr_time = ( $timestamp ) ? '['.getMicroTime(1).'] ' : '';
	
//	logstr($arr_name, '$arr_name');
//	logstr($arr_time, '$arr_time');
	
	if ($opened)
		$opened = ' open';
	if (is_object($in) or is_array($in))
	{
		echo '<div>';
		echo '<details' . $opened . '>';
		echo '<summary>';
		echo $arr_time . $arr_name;
		echo (is_object($in)) ? 'Object {' . count((array)$in) . '}' : 'Array [' . count($in) . ']';
		echo '</summary>';
		pretty_print_rec($in, $opened);
		echo '</details>';
		echo '</div>';
	}
}

function pretty_print_rec($in, $opened, $margin = 10)
{
	if (!is_object($in) && !is_array($in))
		return;
	
	foreach ($in as $key => $value)
	{
		if (is_object($value) or is_array($value))
		{
			echo '<details style="margin-left:' . $margin . 'px" ' . $opened . '>';
			echo '<summary>';
			echo (is_object($value)) ? $key . ' {' . count((array)$value) . '}' : $key . ' [' . count($value) . ']';
			echo '</summary>';
			pretty_print_rec($value, $opened, $margin + 10);
			echo '</details>';
		} else
		{
			switch (gettype($value))
			{
				case 'string':
					$bgc = 'red';
					break;
				case 'integer':
					$bgc = 'green';
					break;
			}
			echo '<div style="margin-left:' . $margin . 'px">' . $key . ' : <span style="color:' . $bgc . '">' . $value . '</span> (' . gettype($value) . ')</div>';
		}
	}
}