<?php
	class Users_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listUsers(){

			$query = $this->db->get('users');
				return $query->result();
		}

		public function saveuser($data){

			return $this->db->insert('users', $data);

		}

		public function saveedit($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('users', $data);

		}

		public function saveeditPassword($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('users', $data);

		}

	}


