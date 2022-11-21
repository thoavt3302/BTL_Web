<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model
{
 public function /*Class name*/  checkLogin($email,$password)
{
       $query = $this->db->where("email", $email)->where("password", $password)->get('users');
       return $query->result();
}
public function /*Class name*/  checkLoginCustomer($email,$password)
{
       $query = $this->db->where("email", $email)->where("password", $password)->get('customers');
       return $query->result();
}
public function /*Class name*/  NewCustomer($data)
{
       return $this->db->insert("customers", $data);
}
public function /*Class name*/ NewShipping($data)
{
        $this->db->insert("shipping", $data);
        return  $this->db->insert_id();
}
public function /*Class name*/ insert_order($data_order)
{     
        return $this->db->insert("orders", $data_order);
}
 public function /*Class name*/  insert_order_details($data_order_details)
{
       return   $this->db->insert("order_details", $data_order_details);
}
} 