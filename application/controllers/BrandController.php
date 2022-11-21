<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BrandController extends CI_Controller
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
        $this->load->model("BrandModel");
        $data['brand'] = $this->BrandModel->selectBrand();
        $this->load->view("brand/list", $data);
        $this->load->view("admin_template/footer");
    }
    public function create()
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->view("brand/create");
        $this->load->view("admin_template/footer");
    }
    public function store()
    {
        //upload image
        $ori_filename = $_FILES['image']['name'];
        $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
        $config = [
            'upload_path' => './uploads/brand',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'file_name' => $new_name,
        ];
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view("admin_template/header");
            $this->load->view("admin_template/navbar");
            $this->load->view("brand/create", $error);
            $this->load->view("admin_template/footer");
        } else {
            $brand_filename = $this->upload->data('file_name');
            $data = [
                'title' => $this->input->post("title"),
                'description' => $this->input->post("description"),
                'image' => $brand_filename
            ];
            $this->load->model("BrandModel");
            $this->BrandModel->insertBrand($data);
            $this->session->set_flashdata('success', 'Thêm Thương Hiệu Thành Công!');
            redirect(base_url('brand/list'));
        }
    }
    public function /*Class name*/  edit($id)
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("BrandModel");
        $data['brand'] = $this->BrandModel->selectBrandById($id);
        $this->load->view("brand/edit", $data);
        $this->load->view("admin_template/footer");
    }
    public function /*Class name*/   update($id)
    {
        if (!empty($_FILES['image']['name'])) {
            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
            $config = [
                'upload_path' => './uploads/brand',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library("upload", $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view("admin_template/header");
                $this->load->view("admin_template/navbar");
                $this->load->view("brand/create", $error);
                $this->load->view("admin_template/footer");
            } else {
                $brand_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post("title"),
                    'description' => $this->input->post("description"),
                    'image' => $brand_filename
                ];
            }
        } else {
            $data = [
                'title' => $this->input->post("title"),
                'description' => $this->input->post("description")
            ];
        }
        $this->load->model("BrandModel");
        $this->BrandModel->updateBrand($id, $data);
        $this->session->set_flashdata('success', 'Cập Nhật Thương Hiệu Thành Công!');
        redirect(base_url('brand/list'));
    }
    public function /*Class name*/  delete($id)
    {
        $this->load->model("BrandModel");
        $this->BrandModel->deleteBrand($id);
        $this->session->set_flashdata('success', 'Xoá Thương Hiệu Thành Công!');
        redirect(base_url('brand/list'));
    }
    public function /*Class name*/ tim_kiem_brand()
    {
           
           $keyword = isset($_GET['keyword']) ? $_GET['keyword'] :'';
           if(!empty($keyword) ){
             $this->load->model('BrandModel');
             $data = $this->BrandModel->search($keyword);
             $data['brand'] = $data;
             $this->load->view("admin_template/header");
             $this->load->view("admin_template/navbar");
           
            
             $this->load->view("brand/list", $data);
             $this->load->view("admin_template/footer");
           

           }else{
            $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("BrandModel");
        $data['brand'] = $this->BrandModel->selectBrand();
        $this->load->view("brand/list", $data);
        $this->load->view("admin_template/footer");
           }
    }
}
