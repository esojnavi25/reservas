<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

class Reservation_Controller extends ZP_Load
{
	public function __construct()
	{
		$this->application = $this->app("default");

		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

		// $this->Reservation_Model = $this->model("Reservation_Model");
	}

	public function index()
	{
		$vars["message"] = __("Hello World");
		$vars["view"] = $this->view("show", true);

		$this->render("content", $vars);
	}

	public function test($param1 = "Hola", $param2 = "Adios")
	{
		print "New dispatcher it's works fine: $param1, $param2";
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

	public function show($message)
	{
		$this->title("ZanPHP");

		$vars["message"] = $message;
		$vars["view"] = $this->view("show", true);

		$this->render("content", $vars);
	}
}
