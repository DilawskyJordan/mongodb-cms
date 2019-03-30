<?php 

class Auth {

	public function before($container, $baseUrl, $httpMethod, $params) {
		$session = $container->get("Session");
		if (!$session->has("loggedIn")) {
			return header("Location: ".$container->get("View")->url("login"));
		}
	}

	public function after($container, $baseUrl, $httpMethod, $params) {
		// do something after the application
	}

}