<?php

/**
 * BOOTSTRAP - Дебаг массива
 * @param array $arr
 * @param bool $beauty сделай красиво
 * @param bool $vardump через vardump
 * @param bool $ret использует return?
 * @return string
 */
function debug($arr, $beauty = true, $vardump = false, $ret = false)
{
	global $USER_PROFILE;
//	if ( $USER_PROFILE['doctor_access'] == 2 )
	if (1)
	{
		if (!$ret)
		{
			if (!$vardump)
			{
				if ($beauty) echo '<div class="alert alert-info" role="alert">';
				echo '<pre>';
				print_r($arr);
				echo '</pre>';
				if ($beauty) echo '</div>';
			} else
			{
				if ($beauty) echo '<div class="alert alert-info" role="alert">';
				echo '<pre>';
				var_dump($arr);
				echo '</pre>';
				if ($beauty) echo '</div>';
			}
		} else
		{
			$response = '';
			
			if (!$vardump)
			{
				if ($beauty) $response .= '<div class="alert alert-info" role="alert">';
				$response .= '<pre>';
				$response .= print_r($arr, 1);
				$response .= '</pre>';
				if ($beauty) $response .= '</div>';
			} else
			{
				if ($beauty) $response .= '<div class="alert alert-info" role="alert">';
				$response .= '<pre>';
				$response .= var_export($arr, 1);
				$response .= '</pre>';
				if ($beauty) $response .= '</div>';
			}
			
			return $response;
		}
		
	}
	
}