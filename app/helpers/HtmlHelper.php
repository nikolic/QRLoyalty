<?php
use Illuminate\Support\Facades\Route;

class HtmlHelper {

	public static function setActive($route, $class = 'active')
	{
	    return (Route::currentRouteName() == $route) ? $class : '';
	}
	
}