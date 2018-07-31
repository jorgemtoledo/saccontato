<?php
	class Ambulances_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listAmbulances(){

			$query = $this->db->get('ambulances');
				return $query->result();
		}

		 public function saveambulance($data){

		 	return $this->db->insert('ambulances', $data);

		 }

		public function saveedit($data,$id){

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();


			$this->db->where('id',$id);
			return $this->db->update('ambulances', $data);

		}

	}