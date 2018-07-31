<?php
	class Clients_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listClients(){

			$query = $this->db->get('clients');
				return $query->result();
		}

		 public function saveclient($data){

		 	return $this->db->insert('clients', $data);

		 }

		public function saveedit($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('clients', $data);

		}

	}