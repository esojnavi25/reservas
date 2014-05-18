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

		$this->Reservation_Model = $this->model("Reservation_Model");
		$this->Seat_Model = $this->model('Seat_Model');
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
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$json = file_get_contents('php://input');
			$obj = json_decode($json, true);
			____($obj);
		}else {
			echo "Nothing happend";
		}
	}

	public function reserv()
	{
		# code...
	}

	public function free()
	{
		# code...
	}

	/**
	* @response: json seats data
	* @method: GET
	*/
	public function seats()
	{
		# code...
		$data = $this->Seat_Model->getAllSeats();
		echo json_encode($data);
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
