<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

class Reservation_Model extends ZP_Load
{
	public function __construct()
	{
		$this->Db = $this->db();

		$this->table = "reservation";
		$this->fields = "ID_Reservation, Name, Time";
	}

	public function createReservation($name)
	{
		$data = array('Name' => $name);
		$IDResvation = $this->Db->insert($this->table, $data);
	}

	public function getReservationData($reservationID)
	{
		# code...
	}


}
