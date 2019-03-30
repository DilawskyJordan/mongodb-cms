<?php

use Carbon\Carbon as Carbon;

class AdminController {

	public function __construct() {
		$container 						= 	new src\app\http\Controllers\Container();
		$data 								=	 	$container->get("Helper")->data();
		$this->firstname 			= 	$data["firstname"];
		$this->lastname 			= 	$data["lastname"];
		$this->websitename 		= 	$data["websitename"];
		$this->description 		=		$data["description"];
		$this->password 			= 	$data["password"];
		$this->email 					= 	$data["email"];
	}

	public function login($params, src\app\http\Controllers\Container $container) {
		return $container->get("View")->show("login");
	}

	public function checkLogin($params, src\app\http\Controllers\Container $container) {

		$session 			= 	$container->get("Session");
		$request 			=		$container->get("Request");

		if($container->get("Helper")->canLogin($request->get("email"), $request->get("password"))) {
			$session->set("loggedIn", true);
			return header("Location: ".$container->get("View")->url("panel"));
		}else {
			return $container->get("View")->show("login", ["errors" => "Email or password is wrong !"]);
		}

	}

	public function panel($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			return $container->get("View")->show("panel", ["posts" => (new MongoDB\Client)->cms->posts->count(),"websitename" => $this->websitename, "description" => $this->description, "v" => $container->get("Helper")->getVisits(new MongoDB\Client)]);
		}
	}

	public function showTasks($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			$token 	= $container->get("Session")->token();
			return $container->get("View")->show("tasks", ["websitename" => $this->websitename, "description" => $this->description, "token" => $token, "tasks" => $container->get("Helper")->getTasks(new MongoDB\Client)]);
		}
	}

	public function postTask($params, src\app\http\Controllers\Container $container) {

		$container->get("Session")->verifyToken();
		$validator 	= 	$container->get("ValidatorFactory");
		$request 	= 	$container->get("Request");

		$validation = 	$validator->make($request,[
			"title" 	=> "required:true,cleanHtml:true,min:3,max:50,type:string"
		]);

		if (sizeof($validation->errors) > 0) {

			$token 				= 		$container->get("Session")->token();
			$container->get("View")->show("tasks", ["errors" => $validation->errors,"websitename" => $this->websitename, "description" => $this->description, "token" => $token, "tasks" => $container->get("Helper")->getTasks(new MongoDB\Client)]);
			return 0;

		}

		$collection = (new MongoDB\Client)->cms->tasks;
		$insertOneResult = $collection->insertOne([
		    'title' 	=> 	$request->get("title"),
		    'date' 		=>	date("Y-m-d H:m")
		]);

		return header("Location: ".$container->get("View")->url("tasks"));
	}

	public function deleteTask($params, src\app\http\Controllers\Container $container) {
		$request = $container->get("Request");
		$collection = (new MongoDB\Client)->cms->tasks;
		$deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($request->get("id"))]);

		return header("Location: ".$container->get("View")->url("tasks"));
	}

	public function changeCover($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			$session	 		= 		$container->get("Session");
			$token 				= 		$session->token();
			return $container->get("View")->show("editStyle", ["websitename" => $this->websitename, "description" => $this->description, "token" => $token]);
		}
	}

	public function postChangeCover($params, src\app\http\Controllers\Container $container) {

		$container->get("Session")->verifyToken();
		$request 	= 	$container->get("Request");
		$cover 		= 	$request->file("cover");

		if ($container->get("Helper")->verfiyUploadFile($cover)) {

			move_uploaded_file($cover->getTmp(), "src/app/views/images/banner.jpg");
			return header("Location: ".$container->get("View")->url("changeCover"));

		}else {

			$session 			= 		$container->get("Session");
			$token 				= 		$session->token();

			return $container->get("View")->show("editStyle", ["websitename" => $this->websitename, "description" => $this->description,"token" => $token, "errors" => "File not supported !"]);

		}

	}

	public function postChangeFavicon($params, src\app\http\Controllers\Container $container) {
		$container->get("Session")->verifyToken();
		$request 	= 	$container->get("Request");
		$cover 		= 	$request->file("cover");

		if ($container->get("Helper")->verfiyUploadFile($cover)) {

			move_uploaded_file($cover->getTmp(), "src/app/views/images/superLight.png");
			return header("Location: ".$container->get("View")->url("changeCover"));

		}else {

			$session 			= 		$container->get("Session");
			$token 				= 		$session->token();

			return $container->get("View")->show("editStyle", ["websitename" => $this->websitename, "description" => $this->description,"token" => $token, "errors" => "File not supported !"]);

		}
	}

	public function editDotenv($params, src\app\http\Controllers\Container $container) {
		$session 			= 		$container->get("Session");
		$token 				= 		$session->token();

		return $container->get("View")->show("editDotenv", ["websitename" => $this->websitename, "firstname"=>$this->firstname, "lastname" => $this->lastname, "email" => $this->email,"description" => $this->description,"token" => $token]);
	}

	public function postDotenv($params, src\app\http\Controllers\Container $container) {

		$container->get("Session")->verifyToken();
		$request = $container->get("Request");

		$firstname 		= 	$request->get("firstname");
		$lastname 		= 	$request->get("lastname");
		$websitename 	= 	$request->get("websitename");
		$email 			= 	$request->get("email");
		$description 	= 	$request->get("description");
		$password 		= 	$this->password;

		$data = '
FIRSTNAME = "'.$firstname.'"
LASTNAME = "'.$lastname.'"
EMAIL = "'.$email.'"
WEBSITENAME = "'.$websitename.'"
PASSWORD = "'.$password.'"
DESCRIPTION = "'.$description.'"
		';

		file_put_contents("src/app/http/storage/.env", $data);

		return header("Location: ".$container->get("View")->url("editDotenv"));

	}

	public function changePassword($params, src\app\http\Controllers\Container $container) {
		$container->get("Session")->verifyToken();
		$request 	= $container->get("Request");


		if ($container->get("Helper")->verfiyPassword($request->get("currentPassword"), $this->password)) {
			$newPassword = password_hash($request->get("newPassword"), PASSWORD_BCRYPT, ["salt" => random_bytes(32)]);
$data = '
FIRSTNAME = "'.$this->firstname.'"
LASTNAME = "'.$this->lastname.'"
EMAIL = "'.$this->email.'"
WEBSITENAME = "'.$this->websitename.'"
PASSWORD = "'.$newPassword.'"
DESCRIPTION = "'.$this->description.'"
		';

			file_put_contents("src/app/http/storage/.env", $data);

			return header("Location: ".$container->get("View")->url("editDotenv"));
		}else {
			$token 				= 		$container->get("Session")->token();
			return $container->get("View")->show("editDotenv", ["websitename" => $this->websitename, "firstname"=>$this->firstname, "lastname" => $this->lastname, "email" => $this->email,"description" => $this->description,"token" => $token, "errors" => "Your current password input is false !"]);
		}

	}

	public function addBlog($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			$token 				= 		$container->get("Session")->token();
			return $container->get("View")->show("addBlog", ["websitename" => $this->websitename, "description" => $this->description,"token" => $token]);
		}
	}

	public function postBlog($params, src\app\http\Controllers\Container $container) {

		$container->get("Session")->verifyToken();
		$validator 			= 	$container->get("ValidatorFactory");
		$request 				= 	$container->get("Request");
		$cover 					= 	$request->file("cover");

		if ($cover->size() === 0) {
			echo "Cant upload an empty file !";
			exit;
		}



		$validation = 	$validator->make($request,[
			"title" 	=> "required:true,cleanHtml:true,min:3,max:50,type:string"
		]);

		if (sizeof($validation->errors) > 0) {

			$token 				= 		$container->get("Session")->token();
			$container->get("View")->show("addBlog", ["errors" => $validation->errors,"websitename" => $this->websitename, "description" => $this->description, "token" => $token]);
			return 0;

		}

		if ($container->get("Helper")->saveBlog($request->get("title"), $request->get("post"), $cover,(new MongoDB\Client)->cms->posts)) {
			$token 				= 		$container->get("Session")->token();
			$container->get("View")->show("addBlog", ["done" => "Posted to the website !","websitename" => $this->websitename, "description" => $this->description, "token" => $token]);
			return true;

		}else {
			$token 				= 		$container->get("Session")->token();
			$container->get("View")->show("addBlog", ["errors" => "A problem happened in the database !","websitename" => $this->websitename, "description" => $this->description, "token" => $token]);
			return false;
		}

	}

	public function showBlogs($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			return $container->get("View")->show("showBlogs", ["token" => $container->get("Session")->token(), "websitename" => $this->websitename, "description" => $this->description, "posts" => $container->get("Helper")->getPosts((new MongoDB\Client)->cms->posts)]);
		}
	}

	public function deleteBlog($params, src\app\http\Controllers\Container $container) {
		$container->get("Session")->verifyToken();
		$request = $container->get("Request");
		$collection = (new MongoDB\Client)->cms->posts;
		$deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($request->get("id"))]);
		return header("Location: ".$container->get("View")->url("showBlogs"));
	}

	public function showLog($params, src\app\http\Controllers\Container $container) {
		echo "<pre>";
		echo(file_get_contents("src/app/http/logs.txt"));
		echo "</pre>";
	}

	public function aboutMe($params, src\app\http\Controllers\Container $container) {
		if(file_exists("src/app/http/storage/.env")) {
			$token 				= 		$container->get("Session")->token();
			return $container->get("View")->show("aboutMe", ["websitename" => $this->websitename, "description" => $this->description,"token" => $token, "info" => (new MongoDB\Client)->cms->social->findOne([])]);
		}
	}

	public function postAbout($params, src\app\http\Controllers\Container $container) {
		$container->get("Session")->verifyToken();
		$token = $container->get("Session")->token();
		if ($container->get("Helper")->saveSocial((new MongoDB\Client)->cms->social, $container->get("Request"))) {
			return $container->get("View")->show("aboutMe", ["done"=>" Done !","websitename" => $this->websitename, "description" => $this->description,"token" => $token, "info"=> (new MongoDB\Client)->cms->social->findOne([])]);
		}
		return $container->get("View")->show("aboutMe", ["errors"=>"Faild to insert the informations in the database !","websitename" => $this->websitename, "description" => $this->description,"token" => $token, "info" => (new MongoDB\Client)->cms->social->findOne()]);

	}

	public function logout($params, src\app\http\Controllers\Container $container) {
		if ($container->get("Session")->has("loggedIn")) {
			$container->get("Session")->destroy("loggedIn");
			return header("Location: ".$container->get("View")->url("home"));
		}
		return http_response_code(401);
	}

}
