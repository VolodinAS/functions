<?php
/*
 * Путь до файла: D:/_PROGRAMS_/OpenServer/domains/10msremote/include/php/functions/__jsrefresh.php
 */


/**
 * Прописывает location.href через JS
 * @param string $url
 */
function jsrefresh($url = '')
{
	echo '
<script>
window.location.href=\'' . $url . '\';
</script>
    ';
}