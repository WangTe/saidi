<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 首页图片管理
 * 
 * @author 风格独特
 */

class Index_img_m extends CI_Model 
{
	const IMG_BANNER	=	1;
	
	const IMG_AD		=	2;
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get($id)
	{
		$id = (int) $id;
		$this->db->where('id', $id);
		$query = $this->db->get('index_img');
		if($query->num_rows() > 0) {
			return $query->row_array();
		}
		return FALSE;
	}
	
	public function get_list($type)
	{
		$return = array();
		$this->db->where('type', $type);
		$this->db->order_by('order ASC, id DESC');
		$query = $this->db->get('index_img');
		if($query->num_rows() > 0) {
			$return = $query->result_array();
		}
		return $return;
	}
	
	public function add($order, $type, $title, $url, $path)
	{
		$data = array(
				'order'	=>	$order,
				'type'	=>	$type,
				'title'	=>	$title,
				'url'	=>	$url,
				'path'	=>	$path,
		);
		if($this->db->insert('index_img', $data) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	public function edit($id, $data)
	{
		$id = (int) $id;
		$this->db->where('id', $id);
		$this->db->update('index_img', $data);
	}
	
	public function del($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('index_img') === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
}
