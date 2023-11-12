<?php
require_once __DIR__ . '/vendor/autoload.php';
use Controllers\Api;

header("Content-type: application/json; charset=UTF-8");
$api = new Api();

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

// Split the URL into parts
$parts = explode('/', $url);

// Get the controller and method from the URL
$controllerName = isset($parts[0]) ? ucfirst($parts[0]) : 'Api';
$methodName = isset($parts[1]) ? $parts[1] : 'index';

if(isset($methodName) && !empty($methodName)) {
	
	switch($methodName){
		case 'save':

			$result = $api->save();

			break;
	}

	return $result;
}
 
?>