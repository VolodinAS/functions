<?php
/**
 * Преобразовать массив к html-select
 * @param array $arr массив с объектами, который нужно преобразовать в select
 * @param string $valueField указывается название ПОЛЯ из БД, где содержится уникальный ID строки (по этому параметру берется уникальное значение)
 * @param string $titleField указывается название ПОЛЯ из БД, где содержится НАЗВАНИЕ для данной строки
 * @param string $selectName атрибут name для тега select
 * @param string $attrib дополнительные атрибуты
 * @param array $defaultArr массив с отображаемым первым значением (если не хотите чтобы сразу отображался список).
 *                          Настройка:
 *                          1 - Инициализируйте массив,
 *                          2 - Добавьте в него индекс key - он содержит название ПОЛЯ из БД, где содержится уникальный
 *                              ключ для заранее выбранной строки (можно указать 0)
 *                          3 - Затем добавьте в него индекс value - значение, которое должно быть отображено в теге
 *                              select (например "выберите...")
 * @param array $defaultSelect массив, где указано заранее выбранное значение.
 *                          Настройка:
 *                          1 - Инициализируйте массив
 *                          2 - Добавьте в него индекс key - он содержит название ПОЛЯ из БД, где содержится уникальный
 *                              ключ для заранее выбранной строки
 *                          3 - Затем добавьте в него индекс value - значение, которое должно быть отображено в теге select
 * @return array $результат['result']
 */
function array2select($arr, $valueField, $titleField, $selectName = "selector", $attrib = null, $defaultArr = null, $defaultSelect = null)
{
	$select = "";
	$response = array();
	$response['stat'] = "begin";
	if (is_array($arr))
	{
		
		if (count($arr) > 0)
		{
			
			if ($valueField != "")
			{
				if ($titleField != "")
				{
					
					$select .= "<select name='{$selectName}'{$attrib}>";
					
					if (count($defaultArr))
					{
						$select .= "<option value='{$defaultArr['key']}'>{$defaultArr['value']}</option>";
					}
					
					foreach ($arr as $item)
					{
						$itSelect = '';
						if (count($defaultSelect))
						{
							if ($defaultSelect['value'] == $item[$valueField])
							{
								$itSelect = ' selected';
							}
						}
						$select .= "<option value='{$item[$valueField]}'{$itSelect}>{$item[$titleField]}</option>";
					}
					
					$select .= "</select>";
					
					$response['result'] = $select;
					$response['stat'] = "success";
					
				} else
				{
					$response['stat'] = "error";
					$response['msg'] = "titleField is empty";
				}
			} else
			{
				$response['stat'] = "error";
				$response['msg'] = "valueField is empty";
			}
			
		} else
		{
			$response['stat'] = "error";
			$response['msg'] = "array is empty";
		}
		
	} else
	{
		$response['stat'] = "error";
		$response['msg'] = "1 argument not array";
	}
	
	return $response;
}
