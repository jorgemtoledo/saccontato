<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treatments extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");

		$busca = $this->treatments_model->listTreatments();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/treatments?busca='.$busca.'&') : base_url('/treatments?');

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		if ($indice==1) {
			$data['msg'] = "Cadastrado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('includes/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Deletado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('includes/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('includes/msg_error',$data);
		}

		/**Paginação*/
		$get_total_results = $this->treatments_model->listTreatments($busca);
		$total_resultados = $get_total_results['total'];
		$get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 60);
	  $get_treatments = $this->treatments_model->listTreatments($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);
	  $this->load->view('treatments/index.php', array("treatments"=>$get_treatments['dados'], 'busca'=>$busca, "pag"=>$get_paginacao['paginacao']));
  	/*Paginação*/		
		$this->load->view('includes/html_footer');
	}

	/*Função generica coloque onde quiser*/
	public function paginacao_func($url_pagination,$total_resultados,$resultados_per_pagina=10){
		$config['base_url'] = $url_pagination;

		$config['total_rows'] = $total_resultados;
		$config['per_page'] = $resultados_per_pagina;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'Primeiro';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['last_link'] = 'Último';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="current"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$qtidade = $config['per_page'];
		$this->pagination->initialize($config);
		
		$dados['qtidade_re'] = $qtidade;
		$dados['inicio'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : '0'; 
		$dados['paginacao'] = $this->pagination->create_links();
		return $dados;
	}

  // Export list all excel
	public function exp_all_excel(){
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$list_treatments = $this->treatments_model->list_all_excel();
		$dados = array("list_treatments"=>$list_treatments);
		$this->load->view('treatments/exp_all_excel',$dados);
  }
  
  // Export sac excel
	public function exp_sac_excel(){
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$list_sac_treatments = $this->treatments_model->list_sac_excel();
		$dados = array("list_sac_treatments"=>$list_sac_treatments);
		$this->load->view('treatments/exp_sac_excel',$dados);
	}

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->model("treatments_model");
		$motorcycles = $this->treatments_model->listMotorcyclescombo();
		$ambulances = $this->treatments_model->listAmbulancescombo();
		$clients = $this->treatments_model->listClientscombo();

		$dados = array("motorcycles"=>$motorcycles, "ambulances"=>$ambulances, "clients"=>$clients);
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/addtreatment.php', $dados);
		$this->load->view('includes/html_footer');
	}

	public function savetreatment()
	{
		$this->verifcar_sessao();

		$dataInicial = $this->input->post('date');
		$dataInicial = explode('/', $dataInicial);
    $dataInicial = $dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0];

		$data['client_id'] = $this->input->post('client_id');
		$data['date'] = $dataInicial;
		$data['hour'] = $this->input->post('hour');
		$data['type_care'] = $this->input->post('type_care');
		$data['description_care'] = $this->input->post('description_care');
		$data['information_care'] = $this->input->post('information_care');
		$data['number_radio'] = $this->input->post('number_radio');
		$data['motorcycle'] = $this->input->post('motorcycle');
		$data['motorcycle_id'] = $this->input->post('motorcycle_id');
		$data['ambulance'] = $this->input->post('ambulance');
		$data['ambulance_id'] = $this->input->post('ambulance_id');
		$data['name_contact'] = $this->input->post('name_contact');
		$data['phone_contact'] = $this->input->post('phone_contact');
		$data['hour_contact'] = $this->input->post('hour_contact');
		$data['sac'] = $this->input->post('sac');
		$data['user_id'] = $this->session->userdata('id');
		$data['usersac_id'] = $this->session->userdata('id');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('treatments_model', 'model', TRUE);

    if ($this->model->savetreatment($data)) {
          redirect('treatments/1');
    } else {
          redirect('treatments/2');
    }
	}	

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('treatments')) {
		  redirect('treatments/3');
		} else {
			redirect('treatments/4');
		}
	}

	public function view($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/view.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->editviewTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/edittreatment.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	// Editar ***
	public function save_editteam()
	{
		$this->verifcar_sessao();
		$dataInicial = $this->input->post('date');
		$dataInicial = explode('/', $dataInicial);
    $dataInicial = $dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0];

		$id = $this->input->post('id');
		$data['date'] = $dataInicial;
		$data['hour'] = $this->input->post('hour');
		$data['type_care'] = $this->input->post('type_care');
		$data['description_care'] = $this->input->post('description_care');
		$data['information_care'] = $this->input->post('information_care');
		$data['number_radio'] = $this->input->post('number_radio');
		$data['name_contact'] = $this->input->post('name_contact');
		$data['phone_contact'] = $this->input->post('phone_contact');
		$data['hour_contact'] = $this->input->post('hour_contact');
		$data['approved'] = $this->input->post('approved');

		$this->load->model('treatments_model', 'model', TRUE);

    if ($this->model->saveeditteam($data,$id)) {
      redirect('treatments/5');
    } else {
      redirect('treatments/6');
    }
	}

	// SAC
	public function listsac($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$busca = $this->treatments_model->listviewSac();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/treatments/listsac?busca='.$busca.'&') : base_url('/treatments/listsac?');

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		if ($indice==1) {
			$data['msg'] = "Cadastrado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('includes/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Deletado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('includes/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('includes/msg_error',$data);
		}

		/**Paginação*/
		$get_total_results = $this->treatments_model->listviewSac($busca);
		$total_resultados = $get_total_results['total'];
		$get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 60);
	  $get_treatments = $this->treatments_model->listviewSac($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);
	  $this->load->view('treatments/listsac.php', array("treatments"=>$get_treatments['dados'], 'busca'=>$busca, "pag"=>$get_paginacao['paginacao']));
  	/*Paginação*/		
		$this->load->view('includes/html_footer');
	} 

	public function addsac($id=null, $indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$clients = $this->treatments_model->listClientscombo();
		$result= $this->treatments_model->viewTreatments($this->uri->segment(3));
		$dados = array('result'=>$result, 'clients'=>$clients);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		if ($indice==1) {
			$data['msg'] = "Cadastrado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('includes/msg_error',$data);
		}
		$this->load->view('treatments/addsac.php',$dados);
		$this->load->view('includes/html_footer');
	}

	public function saveindicationsac()
	{
		$this->verifcar_sessao();
		$id = $this->input->post('id');
		$data['name_indicated'] = $this->input->post('name_indicated');
		$data['phone_indicated'] = $this->input->post('phone_indicated');
		$data['client_id'] = $this->input->post('client_id');
		$data['feedbackindication'] = $this->input->post('feedbackindication');
		$data['signed_contract'] = $this->input->post('signed_contract');
		$data['user_id'] = $this->session->userdata('id');
		$data['salesman_id'] = $this->session->userdata('id');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('treatments_model', 'model', TRUE);

    if ($this->model->saveindicationsac($data)) {
      redirect('treatments/addsac/'.$id. '/1');
    } else {
      redirect('treatments/addsac/'.$id. '/2');
    }
	}

	// SaveSac
	public function savesactreatment()
	{
		$this->verifcar_sessao();
		$dataInicial = date('Y/m/d');
		$dataInicial = explode('/', $dataInicial);
    $dataInicial = $dataInicial[0].'-'.$dataInicial[1].'-'.$dataInicial[2];
		$hour_sac = date('H:i');
    $id = $this->input->post('id');
    $data['usersac_id'] = $this->session->userdata('id');
		$data['date_sac'] = $dataInicial;
		$data['hour_sac'] = $hour_sac;
		$data['proximity_protected'] = $this->input->post('proximity_protected');
		$data['state_protected'] = $this->input->post('state_protected');
		$data['value_sac'] = $this->input->post('value_sac');
		$data['description_value'] = $this->input->post('description_value');
		$data['rnc'] = $this->input->post('rnc');
		$data['sac'] = 1; //Confirmacao do atendimento SAC
		$data['feedbackrnc'] = 0; //Confirmacao do atendimento SAC
		$data['indication'] = $this->input->post('indication');

		$this->load->model('treatments_model', 'model', TRUE);

		if ($this->model->savesactreatment($data,$id)) {
      if ($data['rnc'] == 1) {
      $this->load->library("email");
      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'mail.guiacontato.com.br';
      $config['smtp_port'] = '587';
      $config['smtp_user'] = 'contato@guiacontato.com.br'; // email id
      $config['smtp_pass'] = 'contato10'; // email password
      $config['mailtype'] = 'html';
      $config['wordwrap'] = TRUE;
      $config['charset'] = 'utf-8';
      $config['newline'] = "\r\n"; //use double quotes here
      $this->email->initialize($config);

      $this->email->from("sistemasaccontato@gmail.com", "Sistema SAC - Contato");
      $this->email->to(array("interno.qs.diretoria@gmail.com", "contato@guiacontato.com.br", "assessoria@qualisalva.com.br","diretoria@qualisalva.com.br", "interno.qs.operacional@gmail.com"));
      $this->email->cc("sistemasaccontato@gmail.com"); 
      $this->email->bcc("contato@guiacontato.com.br"); 
      $this->email->subject("Foi gerado um RNC Nº".$id);
      $this->email->message("Foi gerado um RNC no Sistema SAC Contao com o numero: ".$id. ".");
      $this->email->send();

        redirect('treatments/listsac/1');
      } else {
        redirect('treatments/listsac/1');
      }

		} else {
			redirect('treatments/listsac2');
		}

	}

	public function viewsac($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewsacTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/viewsac.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function editsac($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->editSacs($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/editsac.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function saveeditsac()
	{
		$this->verifcar_sessao();
		$dataInicial = $this->input->post('tdate_sac');
		$dataInicial = explode('/', $dataInicial);
    $dataInicial = $dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0];
		$id = $this->input->post('id');
		$data['tdate_sac'] = $dataInicial;
		$data['thour_sac'] = $this->input->post('thour_sac');
		$data['tproximity_protected'] = $this->input->post('tproximity_protected');
		$data['tstate_protected'] = $this->input->post('tstate_protected');
		$data['tvalue_sac'] = $this->input->post('tvalue_sac');
		$data['tdescription_value'] = $this->input->post('tdescription_value');
		$data['trnc'] = $this->input->post('trnc');
		$data['tindication'] = $this->input->post('tindication');
		$data['usersac_id'] = $this->session->userdata('id');

		$this->load->model('treatments_model', 'model', TRUE);

    if ($this->model->saveeditteam2($data,$id)) {
      redirect('treatments/5');
    } else {
      redirect('treatments/6');
    }
	}

	//RNC

	public function listrnc($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$treatments = $this->treatments_model->listTreatmentsrnc();

		$dados = array("treatments"=>$treatments);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		if ($indice==1) {
			$data['msg'] = "Cadastrado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('includes/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Deletado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('includes/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('includes/msg_error',$data);
		}
		$this->load->view('treatments/listrnc.php',$dados);
		$this->load->view('includes/html_footer');
	}

	public function viewrnc($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewrncTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/viewrnc.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function addrnc($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewrncTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/addrnc.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	// SaveRnc
	public function savernctreatment()
	{
		$this->verifcar_sessao();
    $id = $this->input->post('id');
    // $data['usersac_id'] = $this->session->userdata('id');
		$data['complaint_rnc'] = $this->input->post('complaint_rnc');
		$data['suggestion_rnc'] = $this->input->post('suggestion_rnc');
		$data['description_rnc'] = $this->input->post('description_rnc');
		$data['sector_rnc'] = $this->input->post('sector_rnc');
		$data['other_sector'] = $this->input->post('other_sector');
		$data['responsible_operational'] = $this->input->post('responsible_operational');
		$data['description_operational'] = $this->input->post('description_operational');
		$data['responsible_collection'] = $this->input->post('responsible_collection');
		$data['description_collection'] = $this->input->post('description_collection');
		$data['responsible_quality'] = $this->input->post('responsible_quality');
		$data['description_quality'] = $this->input->post('description_quality');
		$data['responsible_financial'] = $this->input->post('responsible_financial');
		$data['description_financial'] = $this->input->post('description_financial');
		$data['responsible_commercial'] = $this->input->post('responsible_commercial');
		$data['description_commercial'] = $this->input->post('description_commercial');
		$data['responsible_event'] = $this->input->post('responsible_event');
		$data['description_event'] = $this->input->post('description_event');
		$data['responsible_other'] = $this->input->post('responsible_other');
		$data['description_other'] = $this->input->post('description_other');
		$data['information_rnc'] = $this->input->post('information_rnc');
		$data['corrective_rnc'] = $this->input->post('corrective_rnc');
		$data['preventive_rnc'] = $this->input->post('preventive_rnc');
		$data['conclusion_rnc'] = $this->input->post('conclusion_rnc');
		$data['userreturn_id'] = $this->session->userdata('id');
		$data['feedbackrnc'] = 1; //Confirmacao do atendimento RNC
		$data['feedbackreturn'] = 0; //Confirmacao do atendimento RNC

		$this->load->model('treatments_model', 'model', TRUE);

			if ($this->model->savernctreatment($data,$id)) {
				redirect('treatments/listrnc/1');
			} else {
				redirect('treatments/listrnc2');
			}
	}

	public function editrnc($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewrncTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/editrnc.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	//Return RNC
	public function listrncreturn($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$treatments = $this->treatments_model->listTreatmentsrncreturn();
		$dados = array("treatments"=>$treatments);
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		if ($indice==1) {
			$data['msg'] = "Cadastrado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('includes/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Deletado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('includes/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('includes/msg_error',$data);
		}
		$this->load->view('treatments/listrncreturn.php',$dados);
		$this->load->view('includes/html_footer');
	}

	public function viewrncreturn($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewrncTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/viewrncreturn.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function addrncreturn($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewrncTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/addrncreturn.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	// SaveRncReturn
	public function savernctreatmentreturn()
	{
		$this->verifcar_sessao();
		$dataInicial = $this->input->post('date_return');
		$dataInicial = explode('/', $dataInicial);
    $dataInicial = $dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0];
    $id = $this->input->post('id');
		$data['date_return'] = $dataInicial;
		$data['hour_return'] = $this->input->post('hour_return');
		$data['information_return'] = $this->input->post('information_return');
		$data['corrective_return'] = $this->input->post('corrective_return');
		$data['preventive_return'] = $this->input->post('preventive_return');
		$data['conclusion_return'] = $this->input->post('conclusion_return');
		$data['feedbackreturn'] = $this->input->post('feedbackreturn');
		$data['userreturn_id'] = $this->session->userdata('id');

		$this->load->model('treatments_model', 'model', TRUE);
			if ($this->model->savernctreatmentreturn($data,$id)) {
				redirect('treatments/listrncreturn/1');
			} else {
				redirect('treatments/listrncreturn/2');
			}
	}

	public function editrncreturn($id=null)
	{
		$this->verifcar_sessao();
		$this->load->model("treatments_model");
		$this->data['result'] = $this->treatments_model->viewrncTreatments($this->uri->segment(3));
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('treatments/editrncreturn.php',$this->data);
		$this->load->view('includes/html_footer');
	}

}
