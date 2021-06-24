<?php 

/**
 * 公共辅助方法
 */


/**
 * 根据
 * @Author   Robert
 * @DateTime 2021-05-26
 * @return   [type]     [description]
 */
function route_class()
{
	
	return str_replace('.', '-', Route::currentRouteName());
}


