<?php
$this->add("/home:GET", function($params, $container) {
	$this->middleware("BEFORE", "StoreVisitorsMiddleware", $container);
	$this->middleware("BEFORE", "AllVisitorsMiddleware", $container);
	$this->controller("HomeController", "home", $params, $container);
});
$this->add("/:GET", function($params, $container) {
	$this->middleware("BEFORE", "StoreVisitorsMiddleware", $container);
	$this->middleware("BEFORE", "AllVisitorsMiddleware", $container);
	$this->controller("HomeController", "home", $params, $container);
});
$this->add("/p/id:GET", function($params, $container) {
	$this->middleware("BEFORE", "StoreVisitorsMiddleware", $container);
	$this->middleware("BEFORE", "AllVisitorsMiddleware", $container);
	$this->controller("HomeController", "page", $params, $container);
});
$this->add("/install:GET", function($params, $container) {
	$this->controller("InstallController", "getInfo", $params, $container);
});
$this->add("/postInfo:POST", function($params, $container) {
	$this->middleware("BEFORE", "ValidateDataMiddleware", $container);
	$this->controller("InstallController", "postInfo", $params, $container);
});
$this->add("/login:GET", function($params, $container) {
	$this->middleware("BEFORE", "AllVisitorsMiddleware", $container);
	$this->controller("AdminController", "login", $params, $container);
});
$this->add("/addBlogs:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "showAddBlogs", $params, $container);
});
$this->add("/checkLogin:POST", function($params, $container) {
	$this->controller("AdminController","checkLogin", $params, $container);
});
$this->add("/panel:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "panel", $params, $container);
});
$this->add("/tasks:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "showTasks", $params, $container);
});
$this->add("/postTask:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "postTask", $params, $container);
});
$this->add("/deleteTask:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "deleteTask", $params, $container);
});
$this->add("/changeCover:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "changeCover", $params, $container);
});
$this->add("/postChangeCover:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "postChangeCover", $params, $container);
});
$this->add("/postChangeFavicon:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "postChangeFavicon", $params, $container);
});
$this->add("/editDotenv:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "editDotenv", $params, $container);
});
$this->add("/postDotenv:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "postDotenv", $params, $container);
});
$this->add("/changePassword:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "changePassword", $params, $container);
});
$this->add("/addBlog:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "addBlog", $params, $container);
});
$this->add("/aboutMe:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "aboutMe", $params, $container);
});
$this->add("/postAbout:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "postAbout", $params, $container);
});
$this->add("/postBlog:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "postBlog", $params, $container);
});
$this->add("/b/title:GET", function($params, $container) {
	$this->middleware("BEFORE", "StoreVisitorsMiddleware", $container);
	$this->middleware("BEFORE", "AllVisitorsMiddleware", $container);
	$this->controller("HomeController", "getBlog", $params, $container);
});
$this->add("/showBlogs:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "showBlogs", $params, $container);
});
$this->add("/logout:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "logout", $params, $container);
});
$this->add("/deleteBlog:POST", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "deleteBlog", $params, $container);
});
$this->add("/showLog:GET", function($params, $container) {
	$this->middleware("BEFORE", "Auth", $container);
	$this->controller("AdminController", "showLog", $params, $container);
});
$this->run();
