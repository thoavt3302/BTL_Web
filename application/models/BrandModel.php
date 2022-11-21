<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BrandModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // code...
    }

    public function /*Class name*/ insertBrand($data)
    {
        return $this->db->insert('brands', $data);
    }
    public function /*Class name*/ selectBrand()
    {
        $query = $this->db->get('brands');
        return $query->result_array();
    }
    public function /*Class name*/ selectBrandById($id)
    {
        $query = $this->db->get_where('brands', ['id' => $id]);
        return $query->row();
    }
    public function /*Class name*/   updateBrand($id, $data)
    {
        return $this->db->update('brands', $data, ['id' => $id]);
    }
    public function /*Class name*/ deleteBrand($id)
    {

        return $this->db->delete("brands", ['id' => $id]);
    }
    public function /*Class name*/ search   ($keyword)
	{$this->db->like('title', $keyword);
		$this->db->or_like('description', $keyword);
		



		$query = $this->db->get('brands');
		return $query->result_array();
	
	}
}
