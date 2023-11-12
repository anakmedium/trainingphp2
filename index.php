<?php 
	/**
	 * Bootstrap page
	 * Require file autoload dari vendor
	 */
	require_once __DIR__ . '/vendor/autoload.php';

	use Controllers\Access;
	use Controllers\Task;
	use Models\Model_Access;

	/**
	 * Buat objek dari kelas access
	 */

	$access = new Access();
	$task = new Task();

	$login = false;
	if(isset($_COOKIE['appkey']) && !empty($_COOKIE['appkey'])) {
		$apikey = $access->checkAppKey();
		$login = ($_COOKIE['appkey'] == $apikey)? true : false;
	}
		
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
				case 'home' :
					$controller->index();
					break;
				
				case 'simpan' :
					$controller->save();
					break;

				case 'tampil-data' :
					$controller->show_data();
					break;

				default : 
					$controller->index();
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



?>