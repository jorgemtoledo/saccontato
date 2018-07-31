<?php
	class Indications_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		// public function listIndications(){

		// 	$query = $this->db->get('indications');
		// 		return $query->result();
		// }

		public function listIndications(){


				$this->db->select(
			 	'I.id as indid,
			 	I.user_id as induser_id,
			 	I.client_id as indclient_id,
			 	I.name_indicated as indname_indicated,
			 	I.phone_indicated as indphone_indicated,
			 	I.feedbackindication as indfeedbackindication,
			 	I.salesman_id as indsalesman_id,
			 	I.date_sale as inddate_sale,
			 	I.hour_sale as indhour_sale,
			 	I.contacted as indcontacted,
			 	I.date_contract as inddate_contract,
			 	I.number_contract as indnumber_contract,
			 	I.signed_contract as indsigned_contract,
			 	I.description_contract as inddescription_contract,
			 	I.created as indcreated,
			 	I.modified as indmodified,
			 	C.id as clientid,
			 	C.name as clientname,
			 	U.name as uname');
			 $this->db->from('indications as I');
			 $this->db->join('clients as C', 'C.id = I.client_id','inner');
			 $this->db->join('users as U', 'U.id = I.user_id','inner');
			 $this->db->order_by("indid", "DESC");
			 $query = $this->db->get();
			 return $query->result();

		}

		public function listClientscombo(){

			$query = $this->db->get('clients');
				return $query->result();
		}

		 public function saveindication($data){

		 	return $this->db->insert('indications', $data);

		 }

		 public function viewIndications($id){
        $this->db->select(
			 	'I.id as indid,
			 	I.user_id as induser_id,
			 	I.client_id as indclient_id,
			 	I.name_indicated as indname_indicated,
			 	I.phone_indicated as indphone_indicated,
			 	I.feedbackindication as indfeedbackindication,
			 	I.salesman_id as indsalesman_id,
			 	I.date_sale as inddate_sale,
			 	I.hour_sale as indhour_sale,
			 	I.contacted as indcontacted,
			 	I.date_contract as inddate_contract,
			 	I.number_contract as indnumber_contract,
			 	I.signed_contract as indsigned_contract,
			 	I.description_contract as inddescription_contract,
			 	I.created as indcreated,
			 	I.modified as indmodified,
			 	C.id as clientid,
			 	C.name as clientname,
			 	U.name as uname');
        $this->db->from('indications as I');
		$this->db->join('clients as C', 'C.id = I.client_id','inner');
		$this->db->join('users as U', 'U.id = I.user_id','inner');
		$this->db->where('I.id',$id);
        $this->db->limit(1);
        return $this->db->get()->row();

	}

		public function saveedit($data,$id){

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

			$this->db->where('id',$id);
			return $this->db->update('indications', $data);

		}

		public function saveeditsale($data,$id){

			// echo "<pre>";
			// var_dump($data,$id);
			// echo "</pre>";
			// die();

				$this->db->where('id',$id);
				return $this->db->update('indications', $data);

		}

		public function viewIndicationssale($id){
        $this->db->select(
			 	'I.id as indid,
			 	I.user_id as induser_id,
			 	I.client_id as indclient_id,
			 	I.name_indicated as indname_indicated,
			 	I.phone_indicated as indphone_indicated,
			 	I.feedbackindication as indfeedbackindication,
			 	I.salesman_id as indsalesman_id,
			 	I.date_sale as inddate_sale,
			 	I.hour_sale as indhour_sale,
			 	I.contacted as indcontacted,
			 	I.date_contract as inddate_contract,
			 	I.number_contract as indnumber_contract,
			 	I.signed_contract as indsigned_contract,
			 	I.description_contract as inddescription_contract,
			 	I.created as indcreated,
			 	I.modified as indmodified,
			 	C.id as clientid,
			 	C.name as clientname,
			 	U.name as uname,
			 	S.name as salename');
        $this->db->from('indications as I');
		$this->db->join('clients as C', 'C.id = I.client_id','inner');
		$this->db->join('users as U', 'U.id = I.user_id','inner');
		$this->db->join('users as S', 'S.id = I.salesman_id','inner');
		$this->db->where('I.id',$id);
        $this->db->limit(1);
        return $this->db->get()->row();

	}

	}