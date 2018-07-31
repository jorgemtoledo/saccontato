<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indications extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		$this->verifcar_sessao();

		$this->load->model("indications_model");
		$indications = $this->indications_model->listIndications();

		$dados = array("indications"=>$indications);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		if ($indice==1) {
			$data['msg'] = "Cadastro com sucesso!";
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
		} else	if ($indice==5) {
			$data['msg'] = "Alterado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao alterar!";
			$this->load->view('includes/msg_error',$data);
		}
		$this->load->view('indications/index.php',$dados);
		$this->load->view('includes/html_footer');
	}


	public function view($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("indications_model");


		$this->data['result'] = $this->indications_model->viewIndications($this->uri->segment(3));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('indications/view.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	 public function add()
	 {
	 	$this->verifcar_sessao();

	 	$this->load->model("indications_model");

	 	$clients = $this->indications_model->listClientscombo();

	 	$dados = array("clients"=>$clients);

	 	$this->load->view('includes/html_header');
	 	$this->load->view('includes/menu_left');
	 	$this->load->view('indications/addindication.php',$dados);
	 	$this->load->view('includes/html_footer');
	 }

	public function saveindication()
	{
		$this->verifcar_sessao();

		$data['name_indicated'] = $this->input->post('name_indicated');
		$data['phone_indicated'] = $this->input->post('phone_indicated');
		$data['client_id'] = $this->input->post('client_id');
		$data['feedbackindication'] = $this->input->post('feedbackindication');
		$data['signed_contract'] = $this->input->post('signed_contract');
		$data['user_id'] = $this->session->userdata('id');
		$data['salesman_id'] = $this->session->userdata('id');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->model('indications_model', 'model', TRUE);

			if ($this->model->saveindication($data)) {
						redirect('indications/1');
			} else {
						redirect('indications/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('indications')) {
						redirect('indications/3');
			} else {
						redirect('indications/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("indications_model");


		$this->data['result'] = $this->indications_model->viewIndications($this->uri->segment(3));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('indications/editindication.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function save_edit()
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
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();


		$this->load->model('indications_model', 'model', TRUE);

			if ($this->model->saveedit($data,$id)) {
						redirect('indications/5');
			} else {
						redirect('indications/6');
			}
	}

	public function sale($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("indications_model");

		$this->data['result'] = $this->indications_model->viewIndications($this->uri->segment(3));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('indications/sale.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function save_editsale()
	{
		$this->verifcar_sessao();

		$dataInicial = $this->input->post('date_sale');
		$dataInicial = explode('/', $dataInicial);
        $dataInicial = $dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0];
		// $dataInicial = date('Y/m/d');

		$datecontract = $this->input->post('date_contract');
		$datecontract = explode('/', $datecontract);
        $datecontract = $datecontract[2].'-'.$datecontract[1].'-'.$datecontract[0];

		$id = $this->input->post('id');

		$data['date_sale'] = $dataInicial;
		$data['hour_sale'] = $this->input->post('hour_sale');
		$data['feedbackindication'] = $this->input->post('feedbackindication');
		$data['date_contract'] = $datecontract;
		$data['number_contract'] = $this->input->post('number_contract');
		$data['signed_contract'] = $this->input->post('signed_contract');
		$data['description_contract'] = $this->input->post('description_contract');
		$data['user_id'] = $this->session->userdata('id');
		$data['salesman_id'] = $this->session->userdata('id');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();


		$this->load->model('indications_model', 'model', TRUE);

			if ($this->model->saveeditsale($data,$id)) {
						redirect('indications/5');
			} else {
						redirect('indications/6');
			}
	}

	public function viewsale($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("indications_model");


		$this->data['result'] = $this->indications_model->viewIndicationssale($this->uri->segment(3));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('indications/viewsale.php',$this->data);
		$this->load->view('includes/html_footer');
	}

	public function editsale($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("indications_model");


		$this->data['result'] = $this->indications_model->viewIndicationssale($this->uri->segment(3));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('indications/editsale.php',$this->data);
		$this->load->view('includes/html_footer');
	}
}
