<?php
/**
 * Тот же дебаг, только при использовании return
 * @param array $arr
 * @return string
 */
function debug_ret($arr)
{
	return debug($arr, null, null, 1);
}