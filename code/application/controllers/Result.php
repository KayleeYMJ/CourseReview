<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

	public function index(){
		$this->load->model('review_model');	
		$reviews = $this->review_model->fetch('INFS3202');
		$data['reviews'] = $reviews;
		$data['course_id'] = 'INFS3202';
		$data['course_title'] = 'Web Information Systems';
		$data['current_page']= "result";
		$username = $this->session->userdata('username');

		$this->load->view('header', $data);
		$this->load->view('result', $data);
	}


	public function add_review($course_id){
		$this->load->model('course_model');	
		$this->load->model('review_model');	
		$author = $this->input->post('author');
		$content = $this->input->post('content');
		$username = $this->session->userdata('username');
		$reviews = $this->review_model->add($course_id, $author, $content, $username);
		$reviews = $this->review_model->fetch($course_id);
		$course = $this->course_model->fetch_course($course_id);
		$data['reviews'] = $reviews;
		$data['course_id'] = $course_id;
		$data['current_page']= "result";
		$data['course_title'] = $course[0]['course_title'];
		
		$this->load->view('header', $data);
		$this->load->view('result', $data);
	}

	public function add_shopping($review_id, $course_id){
		$this->load->model('cart_model');	
		$this->load->model('course_model');	
		$this->load->model('review_model');	
		$username = $this->session->userdata('username');
		$this->cart_model->add($review_id, $username);
		$reviews = $this->review_model->fetch($course_id);
		$course = $this->course_model->fetch_course($course_id);
		$data['reviews'] = $reviews;
		$data['course_id'] = $course_id;
		$data['current_page']= "result";
		$data['course_title'] = $course[0]['course_title'];
		$this->load->view('header', $data);
		$this->load->view('result', $data);
	}

	public function show_result($course_id){
		$this->load->model('review_model');	
		$this->load->model('course_model');	
		$reviews = $this->review_model->fetch($course_id);
		$course = $this->course_model->fetch_course($course_id);
		$username = $this->session->userdata('username');
		$data['course_id'] = $course_id;
		$data['course_title'] = $course[0]['course_title'];
		$data['reviews'] = $reviews;
		$data['current_page']= "result";
		$this->load->view('header', $data);
		$this->load->view('result', $data);
	}
}
?>

