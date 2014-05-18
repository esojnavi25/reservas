<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

class Seat_Model extends ZP_Load
{
	public function __construct()
	{
		$this->Db = $this->db();

		$this->table = "seat";
		$this->fields = "ID_Seat, Position, Status, Reservation";
	}



}
