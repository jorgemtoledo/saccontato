<?php
	class Treatments_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listTreatments($nomebusca=null,$inicio=NULL,$quantidade=NULL){
	    $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";

	    $sql = $this->db->query(
			"SELECT
			T.id as tid,
			T.hour as thour,
			T.date as tdate,
			T.type_care as ttype_care,
			T.description_care as tdescription_care,
			T.information_care as tinformation_care,
			T.number_radio as tnumber_radio,
			T.motorcycle as tmotorcycle,
			T.motorcycle_id as tmotorcycle_id,
			T.ambulance as tambulance,
			T.approved as tapproved,
			T.ambulance_id as tambulance_id,
			T.name_contact as tname_contact,
			T.phone_contact as tphone_contact,
			T.hour_contact as thour_contact,
			T.rnc as trnc,
			T.usersac_id as tusersac_id,
			T.indication as tindication,
			T.sac as tsac,
			Usac.name as usacname,
			U.name as uname,
			C.name as cname
			FROM  treatments as T
			INNER JOIN clients as C ON C.id = T.client_id
			INNER JOIN users as U ON U.id = T.user_id
			INNER JOIN users as Usac ON Usac.id = T.usersac_id
			WHERE T.type_care = '$nomebusca' OR U.name LIKE '%{$nomebusca}%' 
			OR C.name LIKE '%{$nomebusca}%' 
			OR T.id LIKE '%{$nomebusca}%' 
			OR T.hour LIKE '%{$nomebusca}%'
			OR T.date LIKE '%{$nomebusca}%' 
			ORDER BY T.id DESC {$inicio}");
			$dados['inicio'] = $inicio;
			$dados['total'] =$sql->num_rows();
			$dados['dados'] = $sql->result_array();
			return $dados;
    }
    
    public function list_all_excel(){
      $this->db->select(
      'T.id as tid,
       T.hour as thour,
       T.date as tdate,
       T.type_care as ttype_care,
       T.description_care as tdescription_care,
       T.information_care as tinformation_care,
       T.number_radio as tnumber_radio,
       T.motorcycle as tmotorcycle,
       T.motorcycle_id as tmotorcycle_id,
       T.ambulance as tambulance,
       T.approved as tapproved,
       T.ambulance_id as tambulance_id,
       T.name_contact as tname_contact,
       T.phone_contact as tphone_contact,
       T.hour_contact as thour_contact,
       T.rnc as trnc,
       T.usersac_id as tusersac_id,
       T.indication as tindication,
       T.sac as tsac,
       Usac.name as usacname,
       U.name as uname,
       C.name as cname');
      $this->db->from('treatments as T');
      $this->db->join('clients as C', 'C.id = T.client_id','inner');
      $this->db->join('users as U', 'U.id = T.user_id','inner');
      $this->db->join('users as Usac', 'Usac.id = T.usersac_id','inner');
      $this->db->order_by("tid", "desc");
      $this->db->limit(5000);
      $query = $this->db->get();
      return $query->result();
    }

		 public function savetreatment($data){
		 	return $this->db->insert('treatments', $data);
		 }

		 public function listClientscombo(){
			$query = $this->db->get('clients');
				return $query->result();
		}

		 public function listMotorcyclescombo(){
			$query = $this->db->get('motorcycles');
				return $query->result();
		}

		public function listAmbulancescombo(){
			$query = $this->db->get('ambulances');
				return $query->result();
		}

		public function viewTreatments($id){
      $this->db->select('T.id as tid,
      T.hour as thour,
      T.date as tdate,
      T.approved as tapproved,
      T.type_care as ttype_care,
      T.description_care as tdescription_care,
      T.information_care as tinformation_care,
      T.number_radio as tnumber_radio,
      T.motorcycle as tmotorcycle,
      T.motorcycle_id as tmotorcycle_id,
      T.ambulance as tambulance,
      T.approved as tapproved,
      T.ambulance_id as tambulance_id,
      T.name_contact as tname_contact,
      T.phone_contact as tphone_contact,
      T.hour_contact as thour_contact,
      U.name as uname,
      C.id as cid,
      C.name as cname,
      M.name as mname,
      A.name as aname');
      $this->db->from('treatments as T');
      $this->db->join('clients as C', 'C.id = T.client_id','inner');
      $this->db->join('users as U', 'U.id = T.user_id','inner');
      $this->db->join('motorcycles as M', 'M.id = T.motorcycle_id','inner');
      $this->db->join('ambulances as A', 'A.id = T.ambulance_id','inner');
      $this->db->where('T.id',$id);
      $this->db->limit(1);
      return $this->db->get()->row();
	}

		public function editviewTreatments($id){
      $this->db->select('T.id as tid,
      T.hour as thour,
      T.date as tdate,
      T.approved as tapproved,
      T.type_care as ttype_care,
      T.description_care as tdescription_care,
      T.information_care as tinformation_care,
      T.number_radio as tnumber_radio,
      T.motorcycle as tmotorcycle,
      T.motorcycle_id as tmotorcycle_id,
      T.ambulance as tambulance,
      T.ambulance_id as tambulance_id,
      T.name_contact as tname_contact,
      T.phone_contact as tphone_contact,
      T.hour_contact as thour_contact,
      U.name as uname,
      C.name as cname,
      M.name as mname,
      A.name as aname');
      $this->db->from('treatments as T');
      $this->db->join('clients as C', 'C.id = T.client_id','inner');
      $this->db->join('users as U', 'U.id = T.user_id','inner');
      $this->db->join('motorcycles as M', 'M.id = T.motorcycle_id','inner');
      $this->db->join('ambulances as A', 'A.id = T.ambulance_id','inner');
      $this->db->where('T.id',$id);
      $this->db->limit(1);
      return $this->db->get()->row();
  }
  
	// Editar Atendimento Equipe
	public function saveeditteam($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('treatments', $data);
	}
	//  SAC	
	public function listviewSac($nomebusca=null,$inicio=NULL,$quantidade=NULL){
		$inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";
		$sql = $this->db->query(
		"SELECT
		T.id as tid,
		T.hour as thour,
		T.date as tdate,
		T.type_care as ttype_care,
		T.description_care as tdescription_care,
		T.information_care as tinformation_care,
		T.number_radio as tnumber_radio,
		T.motorcycle as tmotorcycle,
		T.motorcycle_id as tmotorcycle_id,
		T.ambulance as tambulance,
		T.approved as tapproved,
		T.ambulance_id as tambulance_id,
		T.name_contact as tname_contact,
		T.phone_contact as tphone_contact,
		T.hour_contact as thour_contact,
		T.rnc as trnc,
		T.usersac_id as tusersac_id,
		T.indication as tindication,
		T.sac as tsac,
		Usac.name as usacname,
		U.name as uname,
		C.name as cname
		FROM  treatments as T
		INNER JOIN clients as C ON C.id = T.client_id
		INNER JOIN users as U ON U.id = T.user_id
		INNER JOIN users as Usac ON Usac.id = T.usersac_id
		WHERE C.name LIKE '%{$nomebusca}%' AND T.approved = 1 
		OR T.id LIKE '%{$nomebusca}%' AND T.approved = 1 
		OR U.name LIKE '%{$nomebusca}%' AND T.approved = 1
		ORDER BY T.id DESC {$inicio}");			
		$dados['inicio'] = $inicio;
		$dados['total'] =$sql->num_rows();
		$dados['dados'] = $sql->result_array();
		return $dados;
	}

	public function savesactreatment($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('treatments', $data);
	}

	public function saveindicationsac($data){
		// return $this->db->insert('indications', $data);
	  if ($this->db->insert("indications", $data))
		  return true;
		else
			return false;
	}

	public function viewsacTreatments($id){
    $this->db->select('T.id as tid,
    T.hour as thour,
    T.date as tdate,
    T.type_care as ttype_care,
    T.approved as tapproved,
    T.description_care as tdescription_care,
    T.information_care as tinformation_care,
    T.number_radio as tnumber_radio,
    T.motorcycle as tmotorcycle,
    T.motorcycle_id as tmotorcycle_id,
    T.ambulance as tambulance,
    T.ambulance_id as tambulance_id,
    T.name_contact as tname_contact,
    T.phone_contact as tphone_contact,
    T.hour_contact as thour_contact,
    T.usersac_id as tusersac_id,
    T.date_sac as tdate_sac,
    T.hour_sac as thour_sac,
    T.proximity_protected as tproximity_protected,
    T.state_protected as tstate_protected,
    T.value_sac as tvalue_sac,
    T.description_value as tdescription_value,
    T.rnc as trnc,
    T.indication as tindication,
    T.description_rnc as tdescription_rnc,
    T.suggestion_rnc as tsuggestion_rnc,
    U.name as uname,
    C.name as cname,
    M.name as mname,
    A.name as aname');
    $this->db->from('treatments as T');
    $this->db->join('clients as C', 'C.id = T.client_id','inner');
    $this->db->join('users as U', 'U.id = T.user_id','inner');
    $this->db->join('motorcycles as M', 'M.id = T.motorcycle_id','inner');
    $this->db->join('ambulances as A', 'A.id = T.ambulance_id','inner');
    $this->db->where('T.id',$id);
    $this->db->limit(1);
    return $this->db->get()->row();
	}

	public function editSacs($id){
    $this->db->select('T.id as tid,
    T.hour as thour,
    T.date as tdate,
    T.approved as tapproved,
    T.type_care as ttype_care,
    T.description_care as tdescription_care,
    T.information_care as tinformation_care,
    T.number_radio as tnumber_radio,
    T.motorcycle as tmotorcycle,
    T.motorcycle_id as tmotorcycle_id,
    T.ambulance as tambulance,
    T.ambulance_id as tambulance_id,
    T.name_contact as tname_contact,
    T.phone_contact as tphone_contact,
    T.hour_contact as thour_contact,
    T.usersac_id as tusersac_id,
    T.date_sac as tdate_sac,
    T.hour_sac as thour_sac,
    T.proximity_protected as tproximity_protected,
    T.state_protected as tstate_protected,
    T.value_sac as tvalue_sac,
    T.description_value as tdescription_value,
    T.rnc as trnc,
    T.indication as tindication,
    U.name as uname,
    C.name as cname,
    M.name as mname,
    A.name as aname');
    $this->db->from('treatments as T');
    $this->db->join('clients as C', 'C.id = T.client_id','inner');
    $this->db->join('users as U', 'U.id = T.user_id','inner');
    $this->db->join('motorcycles as M', 'M.id = T.motorcycle_id','inner');
    $this->db->join('ambulances as A', 'A.id = T.ambulance_id','inner');
    $this->db->where('T.id',$id);
    $this->db->limit(1);
    return $this->db->get()->row();
  }
  
	//RNC
	public function listTreatmentsrnc(){
		$this->db->select(
		'T.id as tid,
		T.hour as thour,
		T.date as tdate,
		T.approved as tapproved,
		T.type_care as ttype_care,
		T.description_care as tdescription_care,
		T.information_care as tinformation_care,
		T.number_radio as tnumber_radio,
		T.motorcycle as tmotorcycle,
		T.motorcycle_id as tmotorcycle_id,
		T.ambulance as tambulance,
		T.ambulance_id as tambulance_id,
		T.name_contact as tname_contact,
		T.phone_contact as tphone_contact,
		T.hour_contact as thour_contact,
		T.rnc as trnc,
		T.usersac_id as tusersac_id,
		T.indication as tindication,
		T.sac as tsac,
		T.feedbackrnc as tfeedbackrnc,
		Usac.name as usacname,
		U.name as uname,
		C.name as cname');
		$this->db->from('treatments as T');
		$this->db->join('clients as C', 'C.id = T.client_id','inner');
		$this->db->join('users as U', 'U.id = T.user_id','inner');
		$this->db->join('users as Usac', 'Usac.id = T.usersac_id','inner');
		$this->db->where('T.rnc',1);
		$this->db->order_by("tid", "desc");
		$query = $this->db->get();
		return $query->result();
	}
		//View RNC
	public function viewrncTreatments($id){
    $this->db->select('T.id as tid,
    T.hour as thour,
    T.date as tdate,
    T.approved as tapproved,
    T.type_care as ttype_care,
    T.description_care as tdescription_care,
    T.information_care as tinformation_care,
    T.number_radio as tnumber_radio,
    T.motorcycle as tmotorcycle,
    T.motorcycle_id as tmotorcycle_id,
    T.ambulance as tambulance,
    T.ambulance_id as tambulance_id,
    T.name_contact as tname_contact,
    T.phone_contact as tphone_contact,
    T.hour_contact as thour_contact,
    T.usersac_id as tusersac_id,
    T.date_sac as tdate_sac,
    T.hour_sac as thour_sac,
    T.proximity_protected as tproximity_protected,
    T.state_protected as tstate_protected,
    T.value_sac as tvalue_sac,
    T.description_value as tdescription_value,
    T.rnc as trnc,
    T.indication as tindication,
    T.feedbackrnc as tfeedbackrnc,
    T.complaint_rnc as tcomplaint_rnc,
    T.suggestion_rnc as tsuggestion_rnc,
    T.suggestion_rnc as tsuggestion_rnc,
    T.description_rnc as tdescription_rnc,
    T.sector_rnc as tsector_rnc,
    T.other_sector as tother_sector,
    T.responsible_operational as tresponsible_operational,
    T.description_operational as tdescription_operational,
    T.responsible_collection as tresponsible_collection,
    T.description_collection as tdescription_collection,
    T.responsible_quality as tresponsible_quality,
    T.description_quality as tdescription_quality,
    T.responsible_financial as tresponsible_financial,
    T.description_financial as tdescription_financial,
    T.responsible_commercial as tresponsible_commercial,
    T.description_commercial as tdescription_commercial,
    T.responsible_event as tresponsible_event,
    T.description_event as tdescription_event,
    T.responsible_other as tresponsible_other,
    T.description_other as tdescription_other,
    T.information_rnc as tinformation_rnc,
    T.corrective_rnc as tcorrective_rnc,
    T.preventive_rnc as tpreventive_rnc,
    T.conclusion_rnc as tconclusion_rnc,
    T.date_return as tdate_return,
    T.hour_return as thour_return,
    T.information_return as tinformation_return,
    T.corrective_return as tcorrective_return,
    T.preventive_return as tpreventive_return,
    T.conclusion_return as tconclusion_return,
    T.feedbackreturn as tfeedbackreturn,
    U.name as uname,
    C.name as cname,
    M.name as mname,
    A.name as aname');
    $this->db->from('treatments as T');
    $this->db->join('clients as C', 'C.id = T.client_id','inner');
    $this->db->join('users as U', 'U.id = T.user_id','inner');
    $this->db->join('motorcycles as M', 'M.id = T.motorcycle_id','inner');
    $this->db->join('ambulances as A', 'A.id = T.ambulance_id','inner');
    $this->db->where('T.id',$id);
    $this->db->limit(1);
    return $this->db->get()->row();
	}

	public function savernctreatment($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('treatments', $data);
	}

	//RNCReturn
	public function listTreatmentsrncreturn(){
    $this->db->select(
    'T.id as tid,
    T.hour as thour,
    T.date as tdate,
    T.approved as tapproved,
    T.type_care as ttype_care,
    T.description_care as tdescription_care,
    T.information_care as tinformation_care,
    T.number_radio as tnumber_radio,
    T.motorcycle as tmotorcycle,
    T.motorcycle_id as tmotorcycle_id,
    T.ambulance as tambulance,
    T.ambulance_id as tambulance_id,
    T.name_contact as tname_contact,
    T.phone_contact as tphone_contact,
    T.hour_contact as thour_contact,
    T.rnc as trnc,
    T.usersac_id as tusersac_id,
    T.userreturn_id as tuserreturn_id,
    T.indication as tindication,
    T.sac as tsac,
    T.feedbackrnc as tfeedbackrnc,
    T.date_return as tdate_return,
    T.hour_return as thour_return,
    T.information_return as tinformation_return,
    T.corrective_return as tcorrective_return,
    T.preventive_return as tpreventive_return,
    T.conclusion_return as tconclusion_return,
    T.feedbackreturn as tfeedbackreturn,
    Usac.name as usacname,
    Urncreturn.name as urncreturnname,
    U.name as uname,
    C.name as cname');
    $this->db->from('treatments as T');
    $this->db->join('clients as C', 'C.id = T.client_id','inner');
    $this->db->join('users as U', 'U.id = T.user_id','inner');
    $this->db->join('users as Usac', 'Usac.id = T.usersac_id','inner');
    $this->db->join('users as Urncreturn', 'Urncreturn.id = T.userreturn_id','inner');
    $this->db->where('T.rnc',1);
    $this->db->order_by("tid", "desc");
    $query = $this->db->get();
    return $query->result();
	}

		public function savernctreatmentreturn($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('treatments', $data);
		}
}
