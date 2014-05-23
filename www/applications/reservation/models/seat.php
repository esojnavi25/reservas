<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

class Seat_Model extends ZP_Load
{
	public function __construct()
	{
		$this->Db = $this->db();
		$this->config('reservation', 'reservation');
		$this->table = "seat";
		$this->fields = "ID_Seat, Position, Status, Reservation";
	}

	public function getAllSeats()
	{
		# code...
		return $this->Db->findAll($this->table, $this->fields);
	}

	public function getSeatsByReservation($reservationID)
	{
		# code...
		return $this->Db->findBy('Reservation', $reservationID, $this->table);
	}

	public function countSeatByReservation($reservationID)
	{
		# code...
		$data = $this->Db->findBy('Reservation', $reservationID, $this->table);
		return count($data);
	}

	public function updateStatus($position, $status, $reservation)
	{
		return $this->Db->updateBySQL($this->table, "Status='$status', Reservation=$reservation WHERE Position='$position' LIMIT 1");
	}

	public function freeStatusByID($seatID, $status)
	{
		# code...
		return $this->Db->updateBySQL($this->table, "Status='$status', Reservation=1 WHERE ID_Seat=$seatID LIMIT 1");
	}

	public function freeAllByReservation($reservationID)
	{
		# code...
		$status = FREE_STATUS;
		return $this->Db->updateBySQL($this->table, "Status='$status' WHERE Reservation=1");
	}

	public function reserveSeats($reservationID)
	{
		# code...
		$status = RESERVED_STATUS;
		return $this->Db->updateBySQL($this->table, "Status='$status' WHERE Reservation=$reservationID");
	}



}
