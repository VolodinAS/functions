<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__meta.php
 */


/**
 * Прописной мета-тег перезагрузки страницы
 * @param string $url URL
 * @param int $sec количество секунд до перезагрузки
 */
function meta($url, $sec=30)
{
    echo '<meta http-equiv="refresh" content="'.$sec.'; url='.$url.'; ">';
}