<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		$this->verifcar_sessao();

		$this->load->model("clients_model");
		$clients = $this->clients_model->listClients();

		$dados = array("clients"=>$clients);

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
		$this->load->view('clients/index.php',$dados);
		$this->load->view('includes/html_footer');
	}

	public function view($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['clients'] = $this->db->get('clients')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('clients/view.php',$data);
		$this->load->view('includes/html_footer');
	}

	 public function add()
	 {
	 	$this->verifcar_sessao();

	 	$this->load->view('includes/html_header');
	 	$this->load->view('includes/menu_left');
	 	$this->load->view('clients/addclient.php');
	 	$this->load->view('includes/html_footer');
	 }

	public function saveclient()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['cpf'] = $this->input->post('cpf');
		$data['phone1'] = $this->input->post('phone1');
		$data['phone2'] = $this->input->post('phone2');
		$data['address'] = $this->input->post('address');
		$data['number'] = $this->input->post('number');
		$data['neighborhood'] = $this->input->post('neighborhood');
		$data['city'] = $this->input->post('city');
		$data['state'] = $this->input->post('state');
		$data['agreement'] = $this->input->post('agreement');
		$data['observation'] = $this->input->post('observation');
		$data['active'] = $this->input->post('active');
		$data['user_id'] = $this->session->userdata('id');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('clients_model', 'model', TRUE);

			if ($this->model->saveclient($data)) {
						redirect('clients/1');
			} else {
						redirect('clients/2');
			}
	}

	public function addop()
	 {
	 	$this->verifcar_sessao();

	 	$this->load->view('includes/html_header');
	 	$this->load->view('includes/menu_left');
	 	$this->load->view('clients/addclientop.php');
	 	$this->load->view('includes/html_footer');
	 }

	public function saveclientop()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['cpf'] = $this->input->post('cpf');
		$data['phone1'] = $this->input->post('phone1');
		$data['phone2'] = $this->input->post('phone2');
		$data['address'] = $this->input->post('address');
		$data['number'] = $this->input->post('number');
		$data['neighborhood'] = $this->input->post('neighborhood');
		$data['city'] = $this->input->post('city');
		$data['state'] = $this->input->post('state');
		$data['agreement'] = $this->input->post('agreement');
		$data['observation'] = $this->input->post('observation');
		$data['active'] = $this->input->post('active');
		$data['user_id'] = $this->session->userdata('id');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('clients_model', 'model', TRUE);

			if ($this->model->saveclient($data)) {
						redirect('treatments/1');
			} else {
						redirect('treatments/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('clients')) {
						redirect('clients/3');
			} else {
						redirect('clients/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['clients'] = $this->db->get('clients')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('clients/editclient.php',$data);
		$this->load->view('includes/html_footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['cpf'] = $this->input->post('cpf');
		$data['phone1'] = $this->input->post('phone1');
		$data['phone2'] = $this->input->post('phone2');
		$data['address'] = $this->input->post('address');
		$data['number'] = $this->input->post('number');
		$data['neighborhood'] = $this->input->post('neighborhood');
		$data['city'] = $this->input->post('city');
		$data['state'] = $this->input->post('state');
		$data['agreement'] = $this->input->post('agreement');
		$data['observation'] = $this->input->post('observation');
		$data['active'] = $this->input->post('active');
		$data['user_id'] = $this->session->userdata('id');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('clients_model', 'model', TRUE);

			if ($this->model->saveedit($data,$id)) {
						redirect('clients/5');
			} else {
						redirect('clients/6');
			}
	}
}
