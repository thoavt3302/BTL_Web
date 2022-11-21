<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{

	public function /*Class name*/ __construct()
	{
		parent::__construct();
		$this->load->model("IndexModel");
		$this->load->library("cart");
		$this->data['category'] = $this->IndexModel->getCategoryHome();
		$this->data['brand'] = $this->IndexModel->getBrandHome();
	}
	public function index()
	{
		$this->data['allproduct'] = $this->IndexModel->getAllProduct();
		$this->load->model("IndexModel");
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function product($id)
	{
		$this->data['product_details'] = $this->IndexModel->getProductDetails($id);
		$this->load->model("IndexModel");
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/product_details', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function category($id)
	{
		$this->data['category_product'] = $this->IndexModel->getCategoryProduct($id);
		$this->load->model("IndexModel");
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function brand($id)
	{
		$this->data['brand_product'] = $this->IndexModel->getBrandProduct($id);
		$this->load->model("IndexModel");
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/brand', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function cart()
	{
		$this->load->model("IndexModel");
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}
	public function add_to_cart()
	{
		$product_id = $this->input->post("product_id");
		$quantity = $this->input->post("quantity");
		$this->data['product_details'] = $this->IndexModel->getProductDetails($product_id);
		foreach ($this->data['product_details'] as $key => $pro) {
			$cart = array(
				'id'      => $pro->id,
				'qty'     => $quantity,
				'price'   => $pro->price,
				'name'    => $pro->title,
				'options' => array('image' => $pro->image)
			);
		}
		$this->cart->insert($cart);
		redirect(base_url() . 'gio-hang', 'refresh');
	}
	public function delete_all_cart()
	{
		$this->cart->destroy();
		redirect(base_url() . 'gio-hang', 'refresh');
	}
	public function delete_item($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url() . 'gio-hang', 'refresh');
	}
	//  public function /*Class name*/ update_cart_item()
	// {
	// 	   $rowid = $this->input->post("rowid");
	// 	   $quantity = $this->input->post("quantity");
	// 	   foreach ($this->cart->contents()  as $items  ){
	// 		if($rowid == $items['rowid']){
	// 			$data = array(
	// 				'rowid'  => $rowid,
	// 				'qty'    =>  $quantity

	// 		);
	// 		 }

	// 	 }
	// 	 $this->cart->update($data);	
	// 	// redirect(base_url().'gio-hang','refresh');

	// }
	public function /*Class name*/ checkout()
	{
		if ($this->session->userdata('LoggedInCustomer') && $this->cart->contents()) {
			$this->load->model("IndexModel");
			$this->load->view('pages/template/header', $this->data);
			// $this->load->view('pages/template/slider');
			$this->load->view('pages/checkout', $this->data);
			$this->load->view('pages/template/footer');
		} else {
			redirect(base_url() . 'gio-hang');
		}
	}
	public function login()
	{
		$this->load->model("IndexModel");
		// $this->load->view('pages/template/header');
		//$this->load->view('pages/template/slider');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}
	public function /*Class name*/ login_customer()
	{
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$this->load->model("LoginModel");
			$result = $this->LoginModel->checkLoginCustomer($email, $password);
			if ($result) {
				$session_array = [
					'id' => $result[0]->id,
					'name' => $result[0]->name,
					'email' => $result[0]->email
				];
				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'Đăng Nhập Thành Công!');
				redirect(base_url('checkout'));
			} else {
				$this->session->set_flashdata('error', 'Đăng Nhập Thất Bại!');
				redirect(base_url('dang-nhap'));
			}
	}
	public function /*Class name*/ dang_ky()
	{
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$name = $this->input->post("name");
			$data = array(
				'name' => $name,
				'email' => $email,
				'password' => $password
			);
			$this->load->model("LoginModel");
			$result = $this->LoginModel->NewCustomer($data);
			if ($result) {
				$message = "Chúc Mừng Bạn Đã Đăng Kí Thành Công !";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$this->load->view('pages/login');
			$this->load->view('pages/template/footer');		
			} 
	}
	public function /*Class name*/ dang_xuat()
	{
		$this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success', 'Đăng xuất thành công ');
		redirect(base_url('dang-nhap'));
	}
	public function /*Class name*/ confirm_checkout()
	{
			$email = $this->input->post("email");
			$shipping_method = $this->input->post("shipping_method");
			$name = $this->input->post("name");
			$order_date = $this->input->post("order_date");
			$phone = $this->input->post("phone");
			$address = $this->input->post("address");
			$data = array(
				'name' => $name,
				'email' => $email,
				'method' => $shipping_method,
				'order_date' => $order_date,
				'phone' => $phone,
				'address' => $address
			);
			$this->load->model("LoginModel");
			$result = $this->LoginModel->NewShipping($data);
			if ($result) {
				//order
				$order_code = rand(0000000, 9999999);
				$data_order = array(
					'order_code' => $order_code,
					'ship_id' => $result
				);
				 $this->LoginModel->insert_order($data_order);
				//order details
				foreach ($this->cart->contents() as $items) {
					$data_order_details = array(
						'order_code' => $order_code,
						'product_id' => $items['id'],
						'quantity' => $items['qty']
					);
				$this->LoginModel->insert_order_details($data_order_details);
				}
				$this->cart->destroy();
				redirect(base_url('/thanks'));
			} 
	}
	public function thanks()
	{
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/thanks');
		$this->load->view('pages/template/footer');
	}
	public function tim_kiem()
	{
		if(isset($_GET['keyword']) && $_GET['keyword']!='') {
			$keyword = $_GET['keyword'];
		}
		$this->data['product'] = $this->IndexModel->getProductByKeyWord($keyword);
		$this->data['title'] = $keyword;
		$this->load->model("IndexModel");
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/timkiem', $this->data);
		$this->load->view('pages/template/footer');
	}
}
