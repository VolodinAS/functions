<?php
/**
 * ПЕРЕДЕЛАТЬ В:
 *  D:/_PROGRAMS_/OpenServer/domains/10msremote/animelist/php/ajax.php
 * Фреймфункция CURL-запроса
 * @param string $url адрес
 * @param array $post post-параметры
 * @param string $cookie путь до cooki-файла
 * @param string $referer рефер-ссылка
 * @param string $user_agent user agent
 * @return array
 */
function newCurl($url, $post = array(), $cookie, $referer, $user_agent)
{
	$arr = array();
	$arr['stat'] = "begin";
	$arr['msg'] = "";
	
	$arr['url'] = $url;
	$arr['post'] = $post;
	$arr['referer'] = $referer;
	$arr['cookie'] = $cookie;
	
	//if ( !file_exists( $arr['cookie'] ) ) file_put_contents($arr['cookie'], "");
	
	if ($curlInit = curl_init($url))
	{
		//curl_setopt($curlInit,		CURLOPT_HEADER,				true);
		//curl_setopt($curlInit,		CURLOPT_NOBODY,				true);
		curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
		// TIMEOUT
		curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
		// COOKIE
		curl_setopt($curlInit, CURLOPT_COOKIEJAR, $arr['cookie']);
		curl_setopt($curlInit, CURLOPT_COOKIEFILE, $arr['cookie']);
		// REFERER
		curl_setopt($curlInit, CURLOPT_REFERER, $referer);
		// SSL
		curl_setopt($curlInit, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curlInit, CURLOPT_SSL_VERIFYPEER, false);
		// FOLLOW
		curl_setopt($curlInit, CURLOPT_FOLLOWLOCATION, true);
		// USER AGENT
		curl_setopt($curlInit, CURLOPT_USERAGENT, $user_agent);
		// POST
		if (count($post))
		{
			curl_setopt($curlInit, CURLOPT_POST, true);
			curl_setopt($curlInit, CURLOPT_POSTFIELDS, $post);
		}
		
		$response = curl_exec($curlInit);
		
		if (strlen($response))
		{
			$arr['stat'] = "success";
			$arr['msg'] = $response;
		}
		
		curl_close($curlInit);
	} else
	{
		$arr['stat'] = "error";
		$arr['msg'] = "NO CURL";
	}
	
	return $arr;
}