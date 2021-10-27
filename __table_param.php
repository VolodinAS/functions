<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__table_param.php
 */

/**
 * Возвращает переменные с одинаковым подстрочным именем
 * @param string $table Название таблицы
 * @param string $param_substr Содержимое параметра
 * @return array
 */
function table_get_collection($table, $param_substr)
{
	$response = array();
	$response['result'] = false;
	$response['msg'] = 'begin';
	$response['debug'] = array();
	
	if ( strlen($table) > 0 )
	{
		
		$query['TABLE_EXISTS'] = "SHOW TABLES LIKE '{$table}'";
		$result['TABLE_EXISTS'] = mqc($query['TABLE_EXISTS']);
		$amount['TABLE_EXISTS'] = mnr($result['TABLE_EXISTS']);
		
		if ( $amount['TABLE_EXISTS'] == 1 )
		{
			$data['TABLE_EXISTS'] = mr2a($result['TABLE_EXISTS'])[0];
			$found_table = '';
			foreach ($data['TABLE_EXISTS'] as $param=>$table_name) $found_table = $table_name;
			
			if ( $found_table == $table )
			{
				$query['PARAMS'] = "SELECT * FROM {$table} WHERE param_name LIKE '{$param_substr}'";
				$result['PARAMS'] = mqc($query['PARAMS']);
				$amount['PARAMS'] = mnr($result['PARAMS']);
				if ( $amount['PARAMS'] > 0 )
				{
					$data = mr2a($result['PARAMS']);
					$arr = [];
					foreach ($data as $pair)
						$arr[ $pair['param_name'] ] = $pair['param_value'];
					$response['result'] = true;
					$response['data'] = $arr;
					$response['msg'] = "{$table}->{$param_substr}->found[{$amount['PARAMS']}]";
				} else
				{
					$response['msg'] = 'Такой коллекции параметров нет';
				}
			} else
			{
				$response['msg'] = 'Таблицы не существует';
			}
			
		} else
		{
			$response['msg'] = 'Таблицы не найдено';
		}
		
	} else
	{
		$response['msg'] = 'Название не должно быть пустым';
	}
	return $response;
}

/**
 * Множественное обновление переменных, указанных в param_array для таблицы table
 * @param string $table Название таблицы
 * @param array $param_array Список параметров с ключами и значениями
 * @return bool
 */
function table_param_array($table, $param_array)
{
	if ( count($param_array) > 0 )
	{
		foreach ($param_array as $param => $value)
		{
			$go = table_param($table, $param, $value);
		}
		return true;
	} else return false;
}

/**
 * Обновление единичного элемента таблицы. Для получения параметра, поле param_value не заполняется
 * @param string $table Название таблицы
 * @param string $param_name Название параметра
 * @param string $param_value Значение параметра
 * @return array
 */
function table_param($table, $param_name, $param_value=null)
{
	$response = array();
	$response['result'] = false;
	$response['msg'] = 'begin';
	$response['debug'] = array();
	
	if ( strlen($table) > 0 )
	{
	
		$query['TABLE_EXISTS'] = "SHOW TABLES LIKE '{$table}'";
		$result['TABLE_EXISTS'] = mqc($query['TABLE_EXISTS']);
		$amount['TABLE_EXISTS'] = mnr($result['TABLE_EXISTS']);
		
		if ( $amount['TABLE_EXISTS'] == 1 )
		{
			$data['TABLE_EXISTS'] = mr2a($result['TABLE_EXISTS'])[0];
			$found_table = '';
			foreach ($data['TABLE_EXISTS'] as $param=>$table_name) $found_table = $table_name;
			
			if ( $found_table == $table )
			{
				$query['PARAM_FOUND'] = "SELECT * FROM {$table} WHERE param_name='{$param_name}' LIMIT 0,1";
				$result['PARAM_FOUND'] = mqc($query['PARAM_FOUND']);
				$amount['PARAM_FOUND'] = mnr($result['PARAM_FOUND']);
				
				$PARAM_ID = 0;
				if ( $amount['PARAM_FOUND'] == 1 )
				{
					$data['PARAM_FOUND'] = mr2a($result['PARAM_FOUND'])[0];
					$PARAM_ID = $data['PARAM_FOUND']['param_id'];
				}
				
				if ( notnull($param_value) )
				{
					// сохранить значение
					if ( $PARAM_ID > 0 )
					{
						// обновить значение
						$update_values = array(
							'param_value'    =>  $param_value
						);
						$UpdateTable = updateData($table, $update_values, $data['PARAM_FOUND'], "param_id='{$PARAM_ID}'");
						if ( $UpdateTable['stat'] == "success" )
						{
							$response['result'] = true;
							$response['msg'] = "{$table}->{$param_name}->updated->{$param_value}";
						} else
						{
							$response['msg'] = 'Проблемы с обновлением значения';
						}
					} else
					{
						// создать значение
						$create_values = array(
							'param_name' => $param_name,
							'param_value'   =>  $param_value
						);
						$AddParam = appendData($table, $create_values);
						if ( $AddParam['INSERTED_ID'] > 0 )
						{
							$response['result'] = true;
							$response['msg'] = "{$table}->{$param_name}->created->{$param_value}";
						} else
						{
							$response['msg'] = 'Проблемы с созданием параметра';
						}
					}
				} else
				{
					// получить значение
					if ( $PARAM_ID > 0 )
					{
						$response['result'] = true;
						$response['value'] = $data['PARAM_FOUND']['param_value'];
						$response['msg'] = "{$table}->{$param_name}->found";
					} else
					{
						$response['msg'] = "Параметр не найден";
					}
				}
				
			} else
			{
				$response['msg'] = 'Таблицы не существует';
			}
			
		} else
		{
			$response['msg'] = 'Таблицы не найдено';
		}
	
	} else
	{
		$response['msg'] = 'Название не должно быть пустым';
	}
	
	return $response;
}