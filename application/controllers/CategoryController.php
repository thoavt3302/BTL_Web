<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CategoryController extends CI_Controller
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
        $this->load->model("CategoryModel");
        $data['category'] = $this->CategoryModel->selectCategory();
        $this->load->view("category/list", $data);
        $this->load->view("admin_template/footer");
    }
    public function create()
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->view("category/create");
        $this->load->view("admin_template/footer");
    }
    public function store()
    {
        //upload image
        $ori_filename = $_FILES['image']['name'];
        $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
        $config = [
            'upload_path' => './uploads/category',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'file_name' => $new_name,
        ];
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view("admin_template/header");
            $this->load->view("admin_template/navbar");
            $this->load->view("category/create", $error);
            $this->load->view("admin_template/footer");
        } else {
            $category_filename = $this->upload->data('file_name');
            $data = [
                'title' => $this->input->post("title"),
                'description' => $this->input->post("description"),
                'image' => $category_filename
            ];
            $this->load->model("CategoryModel");
            $this->CategoryModel->insertCategory($data);
            $this->session->set_flashdata('success', 'Thêm Danh Mục Thành Công!');
            redirect(base_url('category/list'));
        }
    }
    public function /*Class name*/  edit($id)
    {
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("CategoryModel");
        $data['category'] = $this->CategoryModel->selectCategoryById($id);
        $this->load->view("category/edit", $data);
        $this->load->view("admin_template/footer");
    }
    public function /*Class name*/   update($id)
    {
        if (!empty($_FILES['image']['name'])) {
            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
            $config = [
                'upload_path' => './uploads/category',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library("upload", $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view("admin_template/header");
                $this->load->view("admin_template/navbar");
                $this->load->view("category/create", $error);
                $this->load->view("admin_template/footer");
            } else {
                $category_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post("title"),
                    'description' => $this->input->post("description"),
                    'image' => $category_filename
                ];
            }
        } else {
            $data = [
                'title' => $this->input->post("title"),
                'description' => $this->input->post("description")
            ];
        }
        $this->load->model("CategoryModel");
        $this->CategoryModel->updateCategory($id, $data);
        $this->session->set_flashdata('success', 'Cập Nhật Danh Mục Thành Công!');
        redirect(base_url('category/list'));
    }
    public function /*Class name*/  delete($id)
    {
        $this->load->model("CategoryModel");
        $this->CategoryModel->deleteCategory($id);
        $this->session->set_flashdata('success', 'Xoá Danh Mục Thành Công!');
        redirect(base_url('category/list'));
    }
    public function /*Class name*/ tim_kiem_category()
    {
           
           $keyword = isset($_GET['keyword']) ? $_GET['keyword'] :'';
           if(!empty($keyword) ){
             $this->load->model('CategoryModel');
             $data = $this->CategoryModel->search($keyword);
             $data['category'] = $data;
             $this->load->view("admin_template/header");
             $this->load->view("admin_template/navbar");
           
            
             $this->load->view("category/list", $data);
             $this->load->view("admin_template/footer");
           

           }else{
            $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->model("CategoryModel");
        $data['category'] = $this->CategoryModel->selectCategory();
        $this->load->view("category/list", $data);
        $this->load->view("admin_template/footer");
           }
    }
}
