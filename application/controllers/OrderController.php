<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class OrderController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // code...
    }
    public function index()
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("OrderModel");
        $data['order'] = $this->OrderModel->selectOrder();
        $this->load->view("order/list", $data);
        $this->load->view("admin_template/footer");
    }
    public function view($order_code)
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("OrderModel");
        $data['order_details'] = $this->OrderModel->selectOrderDetails($order_code);
        $this->load->view("order/view", $data);
        $this->load->view("admin_template/footer");
    }
    public function delete_order($order_code,$ship_id)
    {
        $this->load->model("OrderModel");
        $del1 =   $this->OrderModel->deleteShipping($ship_id);
        $del2 = $this->OrderModel->deleteOrderDetails($order_code);
        $del = $this->OrderModel->deleteOrder($order_code,$ship_id);
        if ( $del1&&$del2&&$del) {
            $this->session->set_flashdata('success', 'Xoá Thành Công');
            redirect(base_url('order/list'));
        } else {
            $this->session->set_flashdata('error', 'Xoá Thất Bại');
            redirect(base_url('order/list'));
        }
    }
    public function /*Class name*/ tim_kiem_order()
    {
           
           $keyword = isset($_GET['keyword']) ? $_GET['keyword'] :'';
           if(!empty($keyword) ){
             $this->load->model('OrderModel');
             $data = $this->OrderModel->search($keyword);
             $data['order'] = $data;
             $this->load->view("admin_template/header");
             $this->load->view("admin_template/navbar");
           
            
             $this->load->view("order/list", $data);
             $this->load->view("admin_template/footer");
           

           }else{
            $this->load->view("admin_template/header");
            $this->load->view("admin_template/navbar");
            $this->load->model("OrderModel");
            $data['order'] = $this->OrderModel->selectOrder();
            $this->load->view("order/list", $data);
            $this->load->view("admin_template/footer");
           }
    }
}
