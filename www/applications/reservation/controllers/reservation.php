<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

define("Null_Reservation_ID", 1);

class Reservation_Controller extends ZP_Load
{
	public function __construct()
	{
		$this->application = $this->app("reservation");

		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

		// $this->Reservation_Model = $this->model("Reservation_Model");
	}

	public function index()
	{
		$this->title("Reservaciones");
		$this->Templates->js("app.js", $this->application);
		$vars["view"] = $this->view("main", true);

		$this->render("content", $vars);
	}

	public function apart()
	{
		# code...
	}

	public function reserv()
	{
		# code...
	}

	public function free()
	{
		# code...
	}

	public function seats()
	{
		# code...
	}

	// public function show($message)
	// {
	// 	$this->title("ZanPHP");
	//
	// 	$vars["message"] = $message;
	// 	$vars["view"] = $this->view("show", true);
	//
	// 	$this->render("content", $vars);
	// }
}
