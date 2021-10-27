<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__lineCURL.php
 */


/**
 * Фреймфункция CURL-запроса 2.0
 * @param string $url URL-строка
 * @param array $options Настройки запроса
 * @param string $var_request_counter Подсчитать количество запросов
 * @return array
 */
function lineCURL($url, $options = [], $var_request_counter='TOTAL_REQUESTS_AMOUNT')
{
	global $$var_request_counter;
	
	$response = [];
	$response['data'] = [];
	$response['url'] = $url;
	
	
	
	if (strlen($url) > 0)
	{
		$curl = curl_init();
		if ($curl)
		{
			curl_setopt($curl, CURLOPT_URL, $url);
			
			if (is_null($options['timeout']))
				$options['timeout'] = 10;
			curl_setopt($curl, CURLOPT_TIMEOUT, $options['timeout']);
			
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			
			if (is_null($options['user_agent']))
				$options['user_agent'] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36';
			curl_setopt($curl, CURLOPT_USERAGENT, $options['user_agent']);
			
			if (is_null($options['folloc']))
				$options['folloc'] = true;
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, $options['folloc']);
			
			if (is_null($options['get_header']))
				$options['get_header'] = false;
			curl_setopt($curl, CURLOPT_HEADER, $options['get_header']);
			
			if (is_null($options['sslvp']))
				$options['sslvp'] = false;
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $options['sslvp']);
			
			if (is_null($options['sslvs']))
				$options['sslvs'] = false;
			curl_setopt($curl, CURLOPT_SSL_VERIFYSTATUS, $options['sslvs']);
			
			if (is_null($options['sslvh']))
				$options['sslvh'] = false;
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $options['sslvh']);
			
			if (is_null($options['referer']))
				$options['referer'] = 'https://yandex.ru';
			curl_setopt($curl, CURLOPT_REFERER, $options['referer']);
			
			if (!is_null($options['cookie']))
			{
				curl_setopt($curl, CURLOPT_COOKIEJAR, $options['cookie']);
				curl_setopt($curl, CURLOPT_COOKIEFILE, $options['cookie']);
			}
			
			
			if (count($options['sleep']) > 0)
			{
				usleep(rand($options['sleep']['from'], $options['sleep']['to']));
			}
			
			
			if (count($options['post']) > 0)
			{
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $options['post']);
			}
			
			$result = curl_exec($curl);
			
			if ( notnull($TOTAL_REQUESTS_AMOUNT) )
			{
				$TOTAL_REQUESTS_AMOUNT++;
			}
			
			$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			$curl_errno = curl_errno($curl);
			
			if ($options['get_header'] === true)
			{
				$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
				$header = substr($result, 0, $header_size);
				$body = substr($result, $header_size);
				$response['data']['header'] = $header;
				$response['data']['body'] = $body;
			} else
			{
				$body = $result;
				$response['data']['body'] = $body;
			}
			
			$response['error']['status'] = $http_status;
			$response['error']['text'] = $curl_errno;
			
			$response['options'] = $options;
		} else
		{
			$response['errortype'] = 'curl_error';
			$response['msg'] = 'Ошибка инициализации CURL';
		}
		curl_close($curl);
	} else
	{
		$response['errortype'] = 'url_error';
		$response['msg'] = 'Не указан URL';
	}
	return $response;
}