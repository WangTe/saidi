<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 友情链接模型层
 * 
 * @author 风格独特
 */

class Link_m extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get($lid)
	{
		$lid = (int) $lid;
		$this->db->where('lid', $lid);
		$query = $this->db->get('link');
		if($query->num_rows() > 0) {
			return $query->row_array();
		}
		return FALSE;
	}
	
	public function get_list() 
	{
		$return = array();
		$this->db->order_by('lid ASC');
		$query = $this->db->get('link');
		if($query->num_rows() > 0) {
			$return = $query->result_array();
		}
		return $return;
	}
	
	public function add($name, $url, $title) 
	{
		$data = array(
					'name'	=>	$name,
					'url'	=>	$url,
					'title'	=>	$title,
				);
		if($this->db->insert('link', $data) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	public function edit($lid, $data) 
	{
		$lid = (int) $lid;
		$this->db->where('lid', $lid);
		$this->db->update('link', $data);
	}
	
	public function del($lid) 
	{
		$this->db->where('lid', $lid);
		if($this->db->delete('link') === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
}
