<?php

use Carbon\Carbon;

class StoreVisitorsMiddleware {

	public $path 		= 	"src/app/http/storage/visitors.json";
	public $today;
	public $yesterday;

	public function __construct() {
		$this->today 		= 	Carbon::now();
		$this->yesterday 	= 	Carbon::yesterday();
	}

	public function before($container, $baseUrl, $httpMethod, $params) {
		if(file_exists($this->path)) {
			if(!$this->storeVisitors($this->today, $this->userIp(), $this->getData())) {
				echo "Some problemes whene storing visitor ip ! StoreVisitorsMiddleware.php";
				exit();
			}
		}
		// continue
	}

	public function storeVisitors($ip, $date, $data) {
		if($this->addVisitor($ip, $date, $data)) {
			return true;
		}
		return false;
	}

	public function getData() {
		return json_decode(file_get_contents($this->path), TRUE);
	}

	public function addVisitor($date, $ip, $data) {
		if (array_key_exists($this->yesterday->year."-".$this->yesterday->month."-".$this->yesterday->day, $data)) {
			unset($data[$this->yesterday->year."-".$this->yesterday->month."-".$this->yesterday->day]);
		}
		start:
			if (array_key_exists($date->year."-".$date->month."-".$date->day, $data)) {
				if (!array_key_exists($ip, $data[$date->year."-".$date->month."-".$date->day])) {
					$data[$date->year."-".$date->month."-".$date->day][$ip] = $date->hour.":".$date->minute;
					if(file_put_contents($this->path, json_encode($data))) {
						return true;
					}else {
						return false;
					}
				}else {
					return true;
				}
			}else {
				$data[$date->year."-".$date->month."-".$date->day] = [];
				goto start;
			}
	}

	public function userIp() {
    	if (!empty($_SERVER['HTTP_CLIENT_IP']))	{
      		$ip 	=	$_SERVER['HTTP_CLIENT_IP'];
    	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      		$ip 	=	$_SERVER['HTTP_X_FORWARDED_FOR'];
      	}else {
      		$ip 	=	$_SERVER['REMOTE_ADDR'];
    	}
    	return $ip;
	}

}
