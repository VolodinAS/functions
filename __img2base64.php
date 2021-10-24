<?php
/**
 * Преобразование файла в base64-вид. Полученная строка встраивается в src=""
 * @param string $path путь к файлу
 * @return string
 */
function img2base64($path)
{
	$base64 = "";
	$imageSize = getimagesize($path);
	$imageData = base64_encode(file_get_contents($path));
	$base64 = "data:{$imageSize['mime']};base64,{$imageData}";
	return $base64;
}