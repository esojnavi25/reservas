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

		$this->config('reservation', 'reservation');

		$this->Templates = $this->core("Templates");

		$this->Templates->theme('inicio');

		$this->Reservation_Model = $this->model("Reservation_Model");
		$this->Seat_Model = $this->model('Seat_Model');
	}

	/**
	*	Main function for the View
	*/
	public function index()
	{
		if(SESSION('ReservationID')){
			if(session_has_expired()){
				$this->closeReservation();
			}else{
				$this->reservations();
			}
		}else{
			$this->register();
		}
	}

	/**
	*	Register view
	*/
	private function register()
	{
		# code...
		$this->title("Reservaciones");
		$this->Templates->meta("description", "Sistema de Reservacion de Asientos del Teatro");
		$this->Templates->meta("autor", "Arandi López");
		$this->Templates->js("welcome.js", $this->application);
		$vars["view"] = $this->view("welcome", true);
		$vars["alert"] = $this->Reservation_Model->register();
		$this->render("content", $vars);
	}
	/**
	*	Reservations view
	*/
	private function reservations()
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
	*	Cancellations view
	*/
	public function cancellations($reservationID)
	{
		$reservationID = ($reservationID==1) ? 0 : $reservationID ;
		$this->title("Reservaciones");
		$this->Templates->meta("description", "Panel de Cancelaciones de Asientos.");
		$this->Templates->meta("autor", "Arandi López");
		$vars['seats_data'] = $this->Seat_Model->getSeatsByReservation($reservationID);
		$vars['reservation_data'] = $this->Reservation_Model->getReservationData($reservationID);
		$vars["view"] = $this->view("cancellation", true);
		$this->render("content", $vars);
	}

	//********************* RESTful Service Handling **********************************

	/**
	*	@consume json data to apart a seat
	*	@method POST
	*/
	public function apart_seat()
	{
		# Request the data sent from POST call
		if(SESSION('ReservationID')){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$json = file_get_contents('php://input');
				$obj = json_decode($json, true);
				#____($obj); //Just to debbug the param
				$success = $this->Seat_Model->updateStatus($obj['Position'], $obj['Status'], SESSION('ReservationID'));
				if ($success) {
					# code...
					header("Content-Type: aplication/json; charset=utf-8");
					$data = array(
						'response' => true,
						'position' => $obj['Position']
					);
					print json_encode($data, true);
				}else{
					header("Content-Type: aplication/json; charset=utf-8");
					$data = array('response' => false);
					print json_encode($data);
				}
			}else {
				http_response_code(405);
				print "No response available in your HTTP Request Type...";
			}
		}else{
			http_response_code(403);
			print "Access denied";
		}
	}

	/**
	*	@consume json data to confirm a reservation
	*  @response an true o false
	*	@method POST
	*/
	public function make_reservation()
	{
		if(SESSION('ReservationID')){
			# Request the data sent from POST call
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$json = file_get_contents('php://input');
				$obj = json_decode($json, true);
				if($obj['id'] == SESSION('ReservationID')){
					// ____($obj); //Just to debbug the param
					$success = $this->Seat_Model->reserveSeats(SESSION('ReservationID'));
					if($success){
						header("Content-Type: aplication/json; charset=utf-8");
						$data = array(
							'response' => true,
							'id' => $obj['id']
						);
						print json_encode($data, true);
					}else{
						header("Content-Type: aplication/json; charset=utf-8");
						$data = array(
							'response' => false,
							'id' => $obj['id']
						);
						print json_encode($data, true);
					}
				}else{
					http_response_code(403);
					print "Access denied";
				}
			}else {
				http_response_code(405);
				print "No response available in your HTTP Request Type...";
			}
		}else {
			http_response_code(403);
			print "Access denied";
		}

	}

	/**
	*	@consume json data to free a seat
	*	@method POST
	*/
	public function free_seat()
	{
		# Request the data sent from POST call
		if(SESSION('ReservationID')){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$json = file_get_contents('php://input');
				$obj = json_decode($json, true);
				#____($obj); //Just to debbug the param
				$success = $this->Seat_Model->updateStatus($obj['Position'], $obj['Status'], 1);
				if ($success) {
					# code...
					header("Content-Type: aplication/json; charset=utf-8");
					$data = array(
						'response' => true,
						'position' => $obj['Position']
					);
					print json_encode($data, true);
				}else{
					header("Content-Type: aplication/json; charset=utf-8");
					$data = array('response' => false);
					print json_encode($data);
				}
			}else {
				http_response_code(405);
				print "No response available in your HTTP Request Type...";
			}
		}else{
			http_response_code(403);
			print "Access denied";
		}
	}

	/**
	* @response: json seats data
	* @method: GET
	*/
	public function get_seats()
	{

		if($_SERVER['REQUEST_METHOD'] == "GET"){
			header("Content-Type: aplication/json; charset=utf-8");
			$data = $this->Seat_Model->getAllSeats();
			print json_encode($data);
		}else {
			http_response_code(405);
			print "No response available in your HTTP Request Type...";
		}

		// if($_SERVER['REQUEST_METHOD'] === "GET"){
		// 	header("Content-Type: aplication/json; charset=utf-8");
		// 	$data = $this->Seat_Model->getAllSeats();
		// 	print json_encode($data);
		// }else {
		// 	http_response_code(405);
		// 	print "No response available in your HTTP Request Type...";
		// }
	}

	/**
	* @response: json reservation data
	* @method: GET
	*/
	public function get_reservation_data()
	{
		if(SESSION('ReservationID')){
			if($_SERVER['REQUEST_METHOD'] == "GET"){
				header("Content-Type: aplication/json; charset=utf-8");
				$data = $this->Reservation_Model->getReservationData(SESSION('ReservationID'));
				print json_encode($data);
			}else {
				http_response_code(405);
				print "No response available in your HTTP Request Type...";
			}
		}else{
			http_response_code(403);
			print 'Access denied';
		}
	}

	public function cancel_seat($seatID, $resID)
	{
		# code...
		$success = $this->Seat_Model->freeStatusByID($seatID, FREE_STATUS);
		if($success){
			redirect(path("reservation/cancellations/".$resID));
		}
	}

	public function my_seats_data($reservationID)
	{
		# code...
		if(SESSION('ReservationID')){
			if($_SERVER['REQUEST_METHOD'] == "GET"){
				header("Content-Type: aplication/json; charset=utf-8");
				$data = $this->Seat_Model->getSeatsByReservation($reservationID);
				print json_encode($data);
			}else {
				http_response_code(405);
				print "No response available in your HTTP Request Type...";
			}
		}else{
			http_response_code(403);
			print 'Access denied';
		}
	}

	//******************** functions for performance **********************

	/**
	* just for logout (destroy $_SESSION cookie)
	*/
	public function logout(){
		unsetSessions();
	}

	public function freeAllSeats($reservationID)
	{
		# code...
		$success = $this->Seat_Model->freeAllByReservation($reservationID);
	}

	/**
	* Close the current reservation if the session has expired
	* This also has to free the seats that are aparted in the Reservation to close
	*/
	public function closeReservation()
	{
		# code...
		$reservationID = SESSION('ReservationID');

		# Free all the seats that are in aparted status form this reservation
		$this->Seat_Model->freeAllByReservation($reservationID);

		# Last thing to do is:
		$this->logout();
	}
}
