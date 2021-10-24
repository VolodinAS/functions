<?php

/**
 * Провека объекта на NULL
 * @param void $var
 * @return bool
 */
function notnull($var)
{
	return (gettype($var) != "NULL");
}