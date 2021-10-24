<?php
/**
 * Получить расширение файла
 * Ориентируется по точке, но если в конце названия после расширения что-то есть - будет считать это расширением
 * @param string $filename
 * @return string
 */
function getExtension($filename)
{
	return end(explode(".", $filename));
}