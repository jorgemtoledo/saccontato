<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ambulances extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		$this->verifcar_sessao();

		$this->load->model("ambulances_model");
		$ambulances = $this->ambulances_model->listAmbulances();

		$dados = array("ambulances"=>$ambulances);

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
		$this->load->view('ambulances/index.php',$dados);
		$this->load->view('includes/html_footer');
	}

	public function view($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['ambulances'] = $this->db->get('ambulances')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('ambulances/view.php',$data);
		$this->load->view('includes/html_footer');
	}

	 public function add()
	 {
	 	$this->verifcar_sessao();

	 	$this->load->view('includes/html_header');
	 	$this->load->view('includes/menu_left');
	 	$this->load->view('ambulances/addambulance.php');
	 	$this->load->view('includes/html_footer');
	 }

	public function saveambulance()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['model'] = $this->input->post('model');
		$data['mark'] = $this->input->post('mark');
		$data['year'] = $this->input->post('year');
		$data['license_plate'] = $this->input->post('license_plate');
		$data['active'] = $this->input->post('active');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('ambulances_model', 'model', TRUE);

			if ($this->model->saveambulance($data)) {
						redirect('ambulances/1');
			} else {
						redirect('ambulances/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('ambulances')) {
						redirect('ambulances/3');
			} else {
						redirect('ambulances/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['ambulances'] = $this->db->get('ambulances')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('ambulances/editambulance.php',$data);
		$this->load->view('includes/html_footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['model'] = $this->input->post('model');
		$data['mark'] = $this->input->post('mark');
		$data['year'] = $this->input->post('year');
		$data['license_plate'] = $this->input->post('license_plate');
		$data['active'] = $this->input->post('active');
		$data['description'] = $this->input->post('description');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('ambulances_model', 'model', TRUE);

			if ($this->model->saveedit($data,$id)) {
						redirect('ambulances/5');
			} else {
						redirect('ambulances/6');
			}
	}
}
