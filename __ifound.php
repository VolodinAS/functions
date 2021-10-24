<?php

/**
 * Поиск подстроки needle в строке stack
 * @param string $stack
 * @param string $needle
 * @return bool
 */
function ifound($stack, $needle)
{
	if (strpos($stack, $needle) !== FALSE) return true;
	else return false;
}