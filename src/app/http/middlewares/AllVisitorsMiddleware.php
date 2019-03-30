<?php

use Carbon\Carbon;

class AllVisitorsMiddleware {

	public function before($container, $baseUrl, $httpMethod, $params) {
		$collection = 	(new MongoDB\Client)->cms->visits;
		$collection->deleteMany(['year' => $this->getYear()-1]);
		if($this->ifMonthAndYearExists($collection, $this->getMonth(), $this->getYear()) === NULL)	{
			$this->createVisit($collection, $this->generateData($collection));
			return true;
		}else {
			return $this->addOne($collection, $this->getMonth(), $this->getYear());
		}
	}

	public function getMonth() {
		return Carbon::now()->month;
	}

	public function getYear() {
		return Carbon::now()->year;
	}

	public function getIp() {
		if (!empty($_SERVER['HTTP_CLIENT_IP']))	{
      		$ip 	=	$_SERVER['HTTP_CLIENT_IP'];
    	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      		$ip 	=	$_SERVER['HTTP_X_FORWARDED_FOR'];
      	}else {
      		$ip 	=	$_SERVER['REMOTE_ADDR'];
    	}
    	return $ip;
	}

	public function ifMonthAndYearExists($collection, $month, $year) {
		return $collection->findOne(['month' => $month, "year" => $year]);
	}

	public function generateData($collection) {
		return ['month' 	=> 	$this->getMonth(),
						'year' 	=> $this->getYear(),
			    'visits' 	=>	1
		];
	}

	public function addOne($collection, $month, $year) {
		$data = $collection->findOne(['month' => $month, "year" => $year])->visits;
		settype($data, "integer");
		$updateResult = $collection->updateOne(
		    ['month' => $month, 'year' => $year],
		    ['$set' => ['visits' => $data+1]]
		);
		return true;
	}

	public function createVisit($collection, $data) {
		return $collection->insertOne($data);
	}

		public function after($container, $baseUrl, $httpMethod, $params) {}

}
