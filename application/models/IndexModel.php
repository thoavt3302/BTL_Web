<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class IndexModel extends CI_Model
{

    public function getCategoryHome()
    {
        $query = $this->db->get_where('categories');
        return $query->result();
        // code...
    }
    public function getBrandHome()
    {
        $query = $this->db->get_where('brands');
        return $query->result();
        // code...
    }
    public function getAllProduct()
    {
        $query = $this->db->get_where('products', ['status' => 1]);
        return $query->result();
        // code...
    }
    public function getCategoryProduct($id)
    {
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id=categories.id')
            ->join('brands', 'brands.id=products.brand_id')
            ->where('products.category_id=', $id)
            ->get();
        return $query->result();
    }
    public function getBrandProduct($id)
    {
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id=categories.id')
            ->join('brands', 'brands.id=products.brand_id')
            ->where('products.brand_id=', $id)
            ->get();
        return $query->result();
    }

    public function getProductDetails($id)
    {
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id=categories.id')
            ->join('brands', 'brands.id=products.brand_id')
            ->where('products.id=', $id)
            ->get();
        return $query->result();
    }
    public function getProductByKeyWord($keyword)
    {
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('products')
            ->join('categories', 'products.category_id=categories.id')
            ->join('brands', 'brands.id=products.brand_id')
            ->like('products.title', $keyword)
            ->get();
        return $query->result();
    }

}
