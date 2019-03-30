<?php

use Carbon\Carbon;

class InstallController {

	public function getInfo($params, src\app\http\Controllers\Container $container) {
		if(!file_exists("src/app/http/storage/.env")) {
			return $container->get("View")->show("getInfo");
		}
		echo "<p style='color: red;'>Remove src/app/http/storage/.env file to re-install !</p>";
		return 0;
	}
	public function postInfo($params, src\app\http\Controllers\Container $container) {
		if(!file_exists("src/app/http/storage/.env")) {
			$request = $container->get("Request");

			$firstname 		= 	$request->get("firstname");
			$lastname 		= 	$request->get("lastname");
			$websitename 	= 	$request->get("websitename");
			$email 				= 	$request->get("email");
			$password 		= 	password_hash($request->get("password"), PASSWORD_BCRYPT, ["salt" => random_bytes(32)]);
			$description 	= 	$request->get("description");

			$data = '
	FIRSTNAME = "'.$firstname.'"
	LASTNAME = "'.$lastname.'"
	EMAIL = "'.$email.'"
	WEBSITENAME = "'.$websitename.'"
	PASSWORD = "'.$password.'"
	DESCRIPTION = "'.$description.'"
	';

			file_put_contents("src/app/http/storage/.env", $data);
			unlink("src/app/views/getInfo.php");
			return header("Location: ".$container->get("View")->url("home"));
		}
		echo "<p style='color: red;'>Remove src/app/http/storage/.env file to re-install !</p>";
		return 0;
	}

}
