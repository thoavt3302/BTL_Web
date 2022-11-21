<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	public function /*Class name*/  __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view("login/index");
	}
	public function /*Class name*/ login()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$this->load->model("LoginModel");
		$result = $this->LoginModel->checkLogin($email, $password);
		if ($result) {		
			$this->session->set_flashdata('success', 'Đăng Nhập Thành Công!');
			redirect(base_url('product/list'));
		} else {
			$message = "SAI ĐỊA CHỈ EMAIL HOẶC MẬT KHẢU!!! VUI LÒNG THỬ LẠI !";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$this->load->view("login/index");
		}
	}
}
