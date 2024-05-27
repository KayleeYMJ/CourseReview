<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite extends CI_Controller {
	public function index(){
		$data['current_page']= "favourite";
		$username = $this->session->userdata('username');
		$this->load->view('header', $data);
		$this->load->model('cart_model');
		$items = $this->cart_model->fetch($username);
		$data['items']= $items;
		$this->load->view('favourite', $data);
	}
	
	public function delete($review_id){
		$username = $this->session->userdata('username');
		$this->load->model('cart_model');
		$this->cart_model->delete($review_id, $username);
		redirect('favourite');
	}

}
?>