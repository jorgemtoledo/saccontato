<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}


	public function index()
	{
		$this->verifcar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_left');
		$this->load->view('dashboard');
		$this->load->view('includes/html_footer');
	}

	public function login()
	{
		$this->load->view('login');
		$this->load->view('includes/html_footer');
	}

	public function logar()
	{
		$email= $this->input->post('email');
		$password= md5($this->input->post('password'));

		$this->db->where('password', $password);
		$this->db->where('email', $email);
		$this->db->where('active', 1);

		$data['user'] = $this->db->get('users')->result();

		if(count($data['user'])==1){
			$dados['id'] = $data['user'][0]->id;
			$dados['name'] = $data['user'][0]->name;
			$dados['level'] = $data['user'][0]->level;
			// $dados['level'] = $data['user'][0]->level;
			$dados['logado'] = true;

			$this->session->set_userdata($dados);

			redirect('dashboard');
		} else {
			redirect('dashboard/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('dashboard');
	}

}