<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

define("Null_Reservation_ID", 1);

class Reservation_Controller extends ZP_Load
{
	/**
	*	Class constructor
	*/
	public function __construct()
	{
		$this->application = $this->app("reservation");

		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

		$this->Reservation_Model = $this->model("Reservation_Model");
		$this->Seat_Model = $this->model('Seat_Model');
	}
	/**
	*	Main funtion
	*/
	public function index()
	{

	}

	public function reservations()
	{
		# Configuraciones para esta vista
		$this->title("Reservaciones");
		$this->Templates->meta("description", "Panel de Reservaciones del Teatro.");
		$this->Templates->meta("autor", "Arandi López");
		$this->Templates->js("app.js", $this->application);

		$vars["view"] = $this->view("main", true);

		$this->render("content", $vars);
	}

	/**
	*	@consume json data to apart a seat
	*	@method POST
	*/
	public function apart()
	{
		# Request the data sent from POST call
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$json = file_get_contents('php://input');
			$obj = json_decode($json, true);
			____($obj); //Just to debbug the param
		}else {
			http_response_code(405);
			print "No response available in your HTTP Request Type...";
		}
	}

	/**
	*	@consume json data to confirm a reservation
	*	@method POST
	*/
	public function reserv()
	{
		# code...
		# Request the data sent from POST call
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$json = file_get_contents('php://input');
			$obj = json_decode($json, true);
			____($obj); //Just to debbug the param
		}else {
			http_response_code(405);
			print "No response available in your HTTP Request Type...";
		}
	}

	/**
	*	@consume json data to free a seat
	*	@method POST
	*/
	public function free()
	{
		# code...
		# Request the data sent from POST call
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$json = file_get_contents('php://input');
			$obj = json_decode($json);
			____($obj); //Just to debbug the param
		}else {
			http_response_code(405);
			print "No response available in your HTTP Request Type...";
		}
	}

	/**
	* @response: json seats data
	* @method: GET
	*/
	public function seats()
	{
		# code...
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			header("Content-Type: aplication/json; charset=utf-8");
			$data = $this->Seat_Model->getAllSeats();
			print json_encode($data);
		}else {
			http_response_code(405);
			print "No response available in your HTTP Request Type...";
		}

	}
}
