<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__GetRandomGeyMachine.php
 * ЭТО КОПИЯ ФУНКЦИИ RANDOMIZER, ИСПОЛЬЗУЕТСЯ В ЦАОПе!
 */


/**
 * @param $n
 * @return string
 */
function GetRandomGeyMachine($n)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	
	for ($i = 0; $i < $n; $i++)
	{
		$index = rand(0, strlen($characters) - 1);
		$randomString .= $characters[$index];
	}
	
	return $randomString;
}