<?php

class HomeController {

	public $websitename;
	public $description;

	public function __construct() {
		$container 						= 	new src\app\http\Controllers\Container();
		$data 								= 	$container->get("Helper")->data();
		$this->firstname 			= 	$data["firstname"];
		$this->lastname 			= 	$data["lastname"];
		$this->websitename 		= 	$data["websitename"];
		$this->description 		=		$data["description"];
		$this->password 			= 	$data["password"];
		$this->email 					= 	$data["email"];
	}

	public function home($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			return $container->get("View")->show("index", ["info" => (new MongoDB\Client)->cms->social->findOne([]), "pages" => $container->get("Helper")->getPages((new MongoDB\Client)->cms->posts, 10),"posts" => $container->get("Helper")->getPosts((new MongoDB\Client)->cms->posts), "websitename" => $this->websitename, "description" => $this->description]);
		}
		return $container->get("View")->show("home", ["info" => (new MongoDB\Client)->cms->social->findOne([])]);
	}

	public function getBlog($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			return $container->get("View")->show("post", ["info" => (new MongoDB\Client)->cms->social->findOne([]), "post" => $container->get("Helper")->getPost(str_replace("-"," ",$params["title"]), (new MongoDB\Client)->cms->posts), "websitename" => $this->websitename, "description" => $this->description]);
		}
		return $container->get("View")->show("home", ["info" => (new MongoDB\Client)->cms->social->findOne([])]);
	}

	public function page($params, $container) {
		return $container->get("View")->show("index", ["info" => (new MongoDB\Client)->cms->social->findOne([]),"pages" => $container->get("Helper")->getPages((new MongoDB\Client)->cms->posts, 10),"posts" => ($container->get("Helper")->getPostsFormPage((new MongoDB\Client)->cms->posts, 10, ($params["id"] > 1) ? ($params["id"] * 2) - 2 : 0)), "websitename" => $this->websitename, "description" => $this->description]);
	}


}
