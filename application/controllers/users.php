<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		$this->verifcar_sessao();

		$this->load->model("users_model");
		$users = $this->users_model->listUsers();

		$dados = array("users"=>$users);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		if ($indice==1) {
			$data['msg'] = "Usuário cadastrado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('includes/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Usuário deletado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar o usuário.!";
			$this->load->view('includes/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Usuário atualizado com sucesso!";
			$this->load->view('includes/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar o usuário.!";
			$this->load->view('includes/msg_error',$data);
		}
		$this->load->view('users/index.php',$dados);
		$this->load->view('includes/html_footer');
	} 

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('users/adduser.php');
		$this->load->view('includes/html_footer');
	}

	public function saveuser()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['cpf'] = $this->input->post('cpf');
		$data['registration'] = $this->input->post('registration');
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));
		$data['level'] = $this->input->post('level');
		$data['active'] = $this->input->post('active');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('users_model', 'model', TRUE);

			if ($this->model->saveuser($data)) {
						redirect('users/1');
			} else {
						redirect('users/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('users')) {
						redirect('users/3');
			} else {
						redirect('users/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['users'] = $this->db->get('users')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('users/edituser.php',$data);
		$this->load->view('includes/html_footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();
		
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['cpf'] = $this->input->post('cpf');
		$data['registration'] = $this->input->post('registration');
		$data['email'] = $this->input->post('email');
		$data['level'] = $this->input->post('level');
		$data['active'] = $this->input->post('active');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('users_model', 'model', TRUE);

			if ($this->model->saveedit($data,$id)) {
						redirect('users/5');
			} else {
						redirect('users/6');
			}
	}

	public function save_edit_password()
	{
		$this->verifcar_sessao();
		$id = $this->input->post('id');
		$data['password'] = md5($this->input->post('password'));

		$this->load->model('users_model', 'model', TRUE);

			if ($this->model->saveeditPassword($data,$id)) {
						redirect('users/5');
			} else {
						redirect('users/6');
			}
	}
}
