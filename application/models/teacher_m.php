<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 讲师管理模型层
 * 
 * @author 风格独特
 */

class Teacher_m extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get($id)
	{
		$id = (int) $id;
		$this->db->where('id', $id);
		$query = $this->db->get('teacher');
		if($query->num_rows() > 0) {
			return $query->row_array();
		}
		return FALSE;
	}
	
	public function get_list($limit, $offset = 0, $type = '')
	{
		$return = array();
		if($type != '') {
			$this->db->where('type', $type);
		}
		
		$this->db->order_by('index DESC, id DESC');
		$query = $this->db->get('teacher', $limit, $offset);
		$return = $query->result_array();
		return $return;
	}
	
	public function get_index_list($limit)
	{
		$return = array();
	
		$this->db->where('index >', 0);
		$this->db->order_by('index DESC, id DESC');
		$query = $this->db->get('teacher', $limit);
		$return = $query->result_array();
		return $return;
	}
	
	public function get_num($type = '')
	{
		if($type != '') {
			$this->db->where('type', $type);
		}
		return $this->db->count_all_results('teacher');
	}
	
	public function add($data)
	{
		if($this->db->insert('teacher', $data) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	public function edit($id, $data)
	{
		$id = (int) $id;
		$this->db->where('id', $id);
		$this->db->update('teacher', $data);
	}
	
	public function del($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('teacher') === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
}
