<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller
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
        $this->load->model("ProductModel");
        $data['product'] = $this->ProductModel->selectProduct();
        $this->load->view("product/list", $data);
        $this->load->view("admin_template/footer");
    }
    public function create()
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("BrandModel");
        $data['brand'] = $this->BrandModel->selectBrand();
        $this->load->model("CategoryModel");
        $data['category'] = $this->CategoryModel->selectCategory();
        $this->load->view("product/create", $data);
        $this->load->view("admin_template/footer");
    }
    public function store()
    {
  
            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
            $config = [
                'upload_path' => './uploads/product',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library("upload", $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view("admin_template/header");
                $this->load->view("admin_template/navbar");
                $this->load->view("product/create", $error);
                $this->load->view("admin_template/footer");
            } else {
                $product_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post("title"),
                    'description' => $this->input->post("description"),
                    'quantity' => $this->input->post("quantity"),
                    'price' => $this->input->post("price"),
                    'category_id' => $this->input->post("category_id"),
                    'brand_id' => $this->input->post("brand_id"),
                    'status' => $this->input->post("status"),
                    'image' => $product_filename
                ];
                $this->load->model("ProductModel");
                $this->ProductModel->insertProduct($data);
                $this->session->set_flashdata('success', 'Thêm mới sản phẩm thành công!');
                redirect(base_url('product/list'));
            }
     
    }
    public function /*Class name*/  edit($id)
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("BrandModel");
        $data['brand'] = $this->BrandModel->selectBrand();
        $this->load->model("CategoryModel");
        $data['category'] = $this->CategoryModel->selectCategory();
        $this->load->model("ProductModel");
        $data['product'] = $this->ProductModel->selectProductById($id);
        $this->load->view("product/edit", $data);
        $this->load->view("admin_template/footer");
    }
    public function /*Class name*/   update($id)
    {
            if (!empty($_FILES['image']['name'])) {
                //upload image
                $ori_filename = $_FILES['image']['name'];
                $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
                $config = [
                    'upload_path' => './uploads/product',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name' => $new_name
                ];
                $this->load->library("upload", $config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view("admin_template/header");
                    $this->load->view("admin_template/navbar");
                    $this->load->view("product/create", $error);
                    $this->load->view("admin_template/footer");
                } else {
                    $product_filename = $this->upload->data('file_name');
                    $data = [
                        'title' => $this->input->post("title"),
                        'description' => $this->input->post("description"),
                        'quantity' => $this->input->post("quantity"),
                        'price' => $this->input->post("price"),
                        'category_id' => $this->input->post("category_id"),
                        'brand_id' => $this->input->post("brand_id"),
                        'status' => $this->input->post("status"),
                        'image' => $product_filename
                    ];
                }
            } else {
                $data = [
                    'title' => $this->input->post("title"),
                    'description' => $this->input->post("description"),
                    'quantity' => $this->input->post("quantity"),
                    'price' => $this->input->post("price"),
                    'category_id' => $this->input->post("category_id"),
                    'brand_id' => $this->input->post("brand_id"),
                    'status' => $this->input->post("status"),
                ];
            }
            $this->load->model("ProductModel");
            $this->ProductModel->updateProduct($id, $data);
            $this->session->set_flashdata('success', 'Cập nhật sản phẩm thành công!');
            redirect(base_url('product/list'));
    }
    public function /*Class name*/  delete($id)
    {
        $this->load->model("ProductModel");
        $this->ProductModel->deleteProduct($id);
        $this->session->set_flashdata('success', 'Xoá sản phẩm thành công!');
        redirect(base_url('product/list'));
    }
    public function /*Class name*/ tim_kiem_product()
    {
           
           $keyword = isset($_GET['keyword']) ? $_GET['keyword'] :'';
           if(!empty($keyword) ){
             $this->load->model('ProductModel');
             $data = $this->ProductModel->search($keyword);
             $data['product'] = $data;
             $this->load->view("admin_template/header");
             $this->load->view("admin_template/navbar");
           
            
             $this->load->view("product/list", $data);
             $this->load->view("admin_template/footer");
           

           }else{
            $this->load->view("admin_template/header");
            $this->load->view("admin_template/navbar");
            $this->load->model("ProductModel");
            $data['product'] = $this->ProductModel->selectProduct();
            $this->load->view("product/list", $data);
            $this->load->view("admin_template/footer");
           }
    }
}
