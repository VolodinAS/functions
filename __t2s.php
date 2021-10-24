<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__t2s.php
 */


/**
 * Формально - перевод секунд в ччч:мм:сс, но хз, почему t2s
 * @param int $seconds
 * @return string
 */
function t2s($seconds)
{
	$t = round($seconds);
	return sprintf('%02d:%02d:%02d', ($t / 3600), ($t / 60 % 60), $t % 60);
}