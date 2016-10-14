<?php

class Bootstrap {

	public function __construct() {

		$url = $_GET['url'];
		$url = rtrim($url,'/');
		$url = explode('/', $url);

		// print_r($url)

		$file = 'controllers/' .$url[0].'.php';
		if(file_exists($file)){
			require $file;
		}else{
			require 'controllers/error.php';
			$controllers = new Error();
			return false;
		}

		$controllers = new $url[0];

		if (isset($url[2])) {
			$controllers->{$url[1]}($url[2]);
		}else{
			if(isset($url[1])) {
				$controllers->{$url[1]}();
			}
		}
	}
}