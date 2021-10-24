<?php
/**
 * BOOTSTRAP - Полоска уведомления
 * @param string $msg сообщение
 * @param string $tp тип уведомления
 * @param bool $ret используется return?
 * @return string
 */
function bt_notice($msg, $tp = "info", $ret = false)
{
	$div = '<div class="alert alert-' . $tp . '" role="alert">' . $msg . '</div>';
	if (!$ret)
	{
		echo $div;
	} else
	{
		return $div;
	}
	
}