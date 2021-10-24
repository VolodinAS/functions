<?php
/**
 * Тоже, что и преобразование имени к нормальному виду, только вместо пробела неразрывный пробел
 * @param string $name
 * @param string $tp
 * @return string
 */
function shorty_nbsp($name, $tp = "famio")
{
	$NAME = "";
	$name = nodoublespaces($name);
	$arr = explode(" ", $name);
	switch ($tp)
	{
		case "famio":
			$fl1 = ($arr[1]) ? '&nbsp;' . firstLetter($arr[1]) . '.' : '';
			$fl2 = ($arr[2]) ? '&nbsp;' . firstLetter($arr[2]) . '.&nbsp;' : '';
			$NAME = $arr[0] . '&nbsp;' . $fl1 . $fl2;
			break;
		case "famimot":
			$NAME = $name;
			break;
	}
	$NAME = nodoublespaces($NAME);
	$NAME = rtrim($NAME);
	return mb_ucwords(strtolower($NAME));
}