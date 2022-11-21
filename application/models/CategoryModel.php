<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CategoryModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // code...
    }

    public function /*Class name*/ insertCategory($data)
    {
        return $this->db->insert('categories', $data);
    }
    public function /*Class name*/ selectCategory()
    {
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    public function /*Class name*/ selectCategoryById($id)
    {
        $query = $this->db->get_where('categories', ['id' => $id]);
        return $query->row();
    }
    public function /*Class name*/   updateCategory($id, $data)
    {
        return $this->db->update('categories', $data, ['id' => $id]);
    }
    public function /*Class name*/ deleteCategory($id)
    {
        return $this->db->delete("categories", ['id' => $id]);
    }
    public function /*Class name*/ search   ($keyword)
	{$this->db->like('title', $keyword);
		$this->db->or_like('description', $keyword);
		



		$query = $this->db->get('categories');
		return $query->result_array();
	
	}
}
