<?php
/**
 * Генератор случайной строки A-Z, a-z, 0-9 из num количества символов
 * @param int $n количество символов
 * @return string
 */
function RANDOMIZER($n = 256)
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