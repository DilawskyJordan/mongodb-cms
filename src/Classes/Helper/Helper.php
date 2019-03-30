<?php

namespace src\Classes\Helper;
use Dotenv\Dotenv as Dotenv;
use Carbon\Carbon as Carbon;

class Helper {

	public function data() {
		$dotenv 							= 	new Dotenv(__DIR__, '../../app/http/storage/.env');
		$data 								= 	$dotenv->load();

		return [
			"firstname" 				=>	explode('"', $data[0])[1],
			"lastname" 					=>	explode('"', $data[1])[1],
			"websitename" 			=> 	explode('"', explode("=", $data[3])[1])[1],
			"description"				=> 	explode('"', $data[5])[1],
			"email" 						=> 	explode('"', $data[2])[1],
			"password" 					=> 	explode('"', $data[4])[1]
		];

	}

	public function canLogin($email, $password) {
		return ($this->data()["email"] === $email AND password_verify($password, $this->data()["password"])) ? true : false;
	}

	public function getVisits($client) {
		return $client->cms->visits->findOne(["month" => Carbon::now()->month, "year" => Carbon::now()->year]);
	}

	public function getTasks($client) {
		return $client->cms->tasks->find([], ["sort" => ["date" => -1]]);
	}


	public function verfiyUploadFile($file) {
		$allows		= 	["png", "jpg", "jpeg", "gif", "mp4", "mkv"];

		if (in_array($file->getExtension(), $allows)) {

			$handle 	= 	fopen($file->getTmp(), "r");
			$content 	= 	fread($handle, filesize($file->getTmp()));
			if (strpos($content, "exec") OR strpos($content, "shell_exec") OR strpos($content, "eval") OR substr($content, 0, strlen("<?")) === "<?" OR substr($content, 0, strlen("<?php")) === "<?php" OR substr($content, 0, strlen("<=")) === "<=") {
				return false;

			}else {
				return true;
			}
		}
	}

	public function verfiyPassword($currentPassword, $reelPassword) {
		return password_verify($currentPassword, $reelPassword);
	}

	public function saveBlog($title, $post, $cover,$collection) {
			if ($this->verfiyUploadFile($cover)) {
				$coverPath = "src/app/views/images/".md5($cover->getName()).".".$cover->getExtension();
				move_uploaded_file($cover->getTmp(), $coverPath);
				$collection->insertOne(['title' 	=> 	$title,'post' 		=>	$post, "cover" => $coverPath, "date" => Carbon::now()->format("Y-m-d")]);
				return true;
			}

			return false;
	}

	public function getPosts($collection) {
			return $this->getPostsFormPage($collection, 10, 0);
	}

	public function getPost($title, $collection) {
		return $collection->findOne(["title" => $title]);
	}

	public function getPostsFormPage($collection, $limit, $skip) {
			return ($collection->count() === 0) ? 0 : $collection->find([], ["sort" => ["date" => -1], "limit" => $limit, "skip" => $skip]);
	}

	public function getPages($collection, $limit) {
		$p = [];
		for ($i = 1; $i <= ceil($collection->count() / $limit) ; $i++) {
			$p[$i] =  $i;
		}
		return ($p);
	}

	public function saveSocial($collection, $request) {
		$collection->drop();
		$collection->insertOne([
			"facebook" 	=> 	(empty($request->get("facebook"))) ? "#" : $request->get("facebook"),
			"twitter" 	=> 	(empty($request->get("twitter"))) ? "#" : $request->get("twitter"),
			"linkedin" 	=> 	(empty($request->get("linkedin"))) ? "#" : $request->get("linkedin"),
			"email" 		=> 	(empty($request->get("email"))) ? "#" : $request->get("email")
		]);
		return true;
	}

}
