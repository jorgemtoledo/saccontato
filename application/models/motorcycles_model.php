<?php
	class Motorcycles_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listMotorcycles(){

			$query = $this->db->get('motorcycles');
				return $query->result();
		}

		 public function savemotorcycle($data){

		 	return $this->db->insert('motorcycles', $data);

		 }

		public function saveedit($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('motorcycles', $data);

		}

	}