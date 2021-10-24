<?php
/**
 * Преобразовать в unix строку дд.мм.гггг
 * @param string $birth
 * @return int
 */
function birthToUnix($birth)
{
	return strtotime($birth); // dd.mm.yyyy
}