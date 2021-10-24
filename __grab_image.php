<?php
/**
 * Скачать изображение из ссылки url с сохранением в saveto
 * @param string $url
 * @param string $saveto
 * @param bool $ret
 * @return bool|string если используется ret - возвращает содержимое изображения, иначе - bool - успешно или не успешно сохранение
 */
function grab_image($url, $saveto = null, $ret = false)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$raw = curl_exec($ch);
	curl_close($ch);
	if ($ret)
	{
		return $raw;
	} else
	{
		if (file_exists($saveto))
		{
			unlink($saveto);
		}
		$fp = fopen($saveto, 'x');
		fwrite($fp, $raw);
		fclose($fp);
		if ($raw)
			return true;
		else
			return false;
	}
}