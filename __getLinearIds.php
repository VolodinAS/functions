<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__getLinearIds.php
 */


/**
 * Получает строку типа (N1, N2, N3) для query-запроса в конструкции IN (...), беря данные из mysqlArray по полю mysqlIndexField
 * @param array $mysqlArray
 * @param string $mysqlIndexField поле с ID
 * @return string
 */
function getLinearIds($mysqlArray, $mysqlIndexField)
{
	$str = '';
	if ($mysqlIndexField == 999)
	{
		$str = implode(', ', $mysqlArray);
	} else
	{
		foreach ($mysqlArray as $mysqlItem)
		{
			if ($str == '')
			{
				$str = $mysqlItem[$mysqlIndexField];
			} else
			{
				$str .= ',' . $mysqlItem[$mysqlIndexField];
			}
		}
	}
	
	return '(' . $str . ')';
}