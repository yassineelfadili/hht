<?php

class nastik_AfterSetupTheme{
	
	
	static function return_thme_option($string,$str=null){
		global $nastik;
		if($str!=null)
		return isset($nastik[''.$string.''][''.$str.'']) ? $nastik[''.$string.''][''.$str.''] : null;
		else
		return isset($nastik[''.$string.'']) ? $nastik[''.$string.''] : null;
	}
	
	
}
?>