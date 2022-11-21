<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class OrderModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    // code...
  }
  public function /*Class name*/ selectOrder()
  {
    $query = $this->db->select('orders.* ,shipping.*')
      ->from('orders')
      ->join('shipping', 'orders.ship_id=shipping.id')
      ->get();
    return $query->result();
  }
  public function /*Class name*/ selectOrderDetails($order_code)
  {
    $query = $this->db->select('order_details.quantity as qty , order_details.order_code,order_details.product_id,products.*')
      ->from('order_details')
      ->join('products', 'order_details.product_id=products.id')
      ->where('order_details.order_code', $order_code)
      ->get();
    return $query->result();
  }
  public function /*Class name*/ deleteOrder($order_code, $ship_id)
  {
    $this->db->where('order_code', $order_code);
    $this->db->where('ship_id', $ship_id);
    return $this->db->delete("orders", ['order_code' => $order_code], ['ship_id' => $ship_id]);
  }
  public function /*Class name*/ deleteOrderDetails($order_code)
  {
    $this->db->where_in('order_code', $order_code);
    return $this->db->delete("order_details");
  }
  public function /*Class name*/ deleteShipping($ship_id)
  {
    $this->db->where_in('id', $ship_id);
    return $this->db->delete("shipping", ['id' => $ship_id]);
  }
  public function /*Class name*/ search   ($keyword)
	{
    $query = $this->db->select('orders.* ,shipping.*')
    ->from('orders')
    ->join('shipping', 'orders.ship_id=shipping.id')
    ->like('shipping.name', $keyword)
    ->or_like('shipping.order_date', $keyword)
    ->or_like('shipping.address', $keyword)
    ->get();
  return $query->result();
	
	}

}
