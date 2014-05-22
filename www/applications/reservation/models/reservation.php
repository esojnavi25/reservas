<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

class Reservation_Model extends ZP_Load
{
	public function __construct()
	{
		$this->Db = $this->db();
		$this->Validator = $this->core('Data');
		$this->table = "reservation";
		$this->fields = "ID_Reservation, Name, Time";
	}

	public function register()
	{
		# code...
		if(POST('submit')){
			$validations = array('name' => 'requiered');

			$data = array('Name' => POST('name') );

			$this->Validator->ignore(array('submit'));

			$res_data = $this->Validator->process($data, $validations);

			if(isset($res_data['error'])){
				return $res_data['error'];
			}

			$success = $this->Db->insert($this->table, $res_data);

			if($success){
				$last_resv = $this->Db->findLast($this->table, 'ID_Reservation');
			}else{

			}

		}else{
			return false;
		}
	}

	public function getReservationData($reservationID)
	{
		# code...
	}


}
