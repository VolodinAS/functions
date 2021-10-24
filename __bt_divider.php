<?php

/**
 * BOOTSTRAP - Прописывание разделителя
 * @param bool $is_ret используется return?
 * @return string
 */
function bt_divider($is_ret=false)
{
	if ( $is_ret )
	{
		return '<div class="dropdown-divider"></div>';
	} else
	{
		echo '<div class="dropdown-divider"></div>';
	}
	
}