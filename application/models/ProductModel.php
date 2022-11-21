<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // code...
    }

    public function /*Class name*/ insertProduct($data)
    {
        return $this->db->insert('products', $data);
    }
    public function /*Class name*/ selectProduct()
    {
        $query = $this->db->select('products.*, categories.title as tendanhmuc, brands.title as tenthuonghieu')
            ->from('products')
            ->join('categories', 'categories.id = products.category_id')
            ->join('brands', 'brands.id = products.brand_id')
            ->get();
        return $query->result_array();
    }
    public function /*Class name*/ selectProductById($id)
    {
        $query = $this->db->get_where('products', ['id' => $id]);
        return $query->row();
    }
    public function /*Class name*/   updateProduct($id, $data)
    {
        return $this->db->update('products', $data, ['id' => $id]);
    }
    public function /*Class name*/ deleteProduct($id)
    {
        return $this->db->delete("products", ['id' => $id]);
    }
    public function /*Class name*/ search   ($keyword)
	{
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('products')
        ->join('categories', 'products.category_id=categories.id')
        ->join('brands', 'brands.id=products.brand_id')
        ->like('products.title', $keyword)
        ->get();
    return $query->result_array();
	
	}
}
