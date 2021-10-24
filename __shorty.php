<?php
/**
 * Преобразование имени к нормальному виду
 * @param string $name
 * @param string $tp
 * @return string
 */
function shorty($name, $tp = "famio")
{
	$NAME = "";
	$arr = explode(" ", $name);
	switch ($tp)
	{
		case "famio":
			$fl1 = ($arr[1]) ? ' ' . firstLetter($arr[1]) . '.' : '';
			$fl2 = ($arr[2]) ? ' ' . firstLetter($arr[2]) . '. ' : '';
			$NAME = $arr[0] . ' ' . $fl1 . $fl2;
			break;
		case "famimot":
			$NAME = $name;
			break;
	}
	$NAME = nodoublespaces($NAME);
	$NAME = rtrim($NAME);
	return mb_ucwords(strtolower($NAME));
}