<?php 

class ValidateDataMiddleware {

	public function before($container, $baseUrl, $httpMethod, $params) {
		$validator = $container->get("ValidatorFactory"); 
		$request = $container->get("Request"); 
		$validation = $validator->make($request, [ 
			"firstname"		=> "required:true,cleanHtml:true,min:3,max:20,type:string",
			"lastname" 		=> "required:true,cleanHtml:true,min:3,max:20,type:string",
			"websitename" 	=> "required:true,cleanHtml:true,min:3,max:20,type:string",
			"email" 		=> "required:true,cleanHtml:true,type:email",
			"password" 		=> "required:true,cleanHtml:true,min:3"
		]); 
		if (sizeof($validation->errors) > 0) { 
			return $container->get("View")->show("getInfo", ["errors" => $validation->errors]);
		} 
		// continue
	}

	public function after($container, $baseUrl, $httpMethod, $params) {
		// do something after the application
	}

}