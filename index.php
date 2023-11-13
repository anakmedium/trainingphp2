<?php 
	/**
	 * Bootstrap page
	 * Require file autoload dari vendor
	 */
	require_once __DIR__ . '/vendor/autoload.php';

	use Controllers\Access;
	use Controllers\Task;
	use Controllers\Api;
	

	/**
	 * Buat objek dari kelas access
	 */

	$access = new Access();
	$task = new Task();
	$api = new Api();

	$login = false;
	if(isset($_COOKIE['appkey']) && !empty($_COOKIE['appkey'])) {
		$apikey = $access->checkAppKey();
		$login = ($_COOKIE['appkey'] == $apikey)? true : false;
	}

	// echo '<pre>'; print_r($_GET['act']) ;echo '</pre>';die();
		
	if($login == true) {
		if(!isset($_GET['act']))
		{
			//pemanggilan method yang akan di-run
			$task->index();
		}
		else
		{
			switch($_GET['act'])
			{	case 'logout' :
					$access->logout();
					break;
				case 'dashboard' :
					$task->index();
					break;

				default : 
					print_r('you dont have permission');
					break;
			}
		}
	} else {
		if(!isset($_GET['act']))
		{
			$access->index();
		} else {
			switch($_GET['act'])
			{	case 'login' :
					$access->login();
					break;
				default :
					print_r('you dont have permission');
					break;
			}
		}
	}

	// if($_GET['act'] == 'api') {
		
	// }



?>