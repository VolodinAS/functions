<?php

/**
 * Провека объекта на NULL
 * @param $var
 * @return bool
 */
function notnull($var)
{
	return (gettype($var) != "NULL");
}