<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 文章管理模型层
 * 
 * @author 风格独特
 */

class Article_m extends CI_Model 
{
	/**
	 * 构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('article_type_m');
	}
	
	/**
	 * 获取单个文章内容
	 * 
	 * @param integer $aid
	 */
	public function get($aid)
	{
		$aid = intval($aid);
		$this->db->where('aid', $aid);
		$query = $this->db->get('article');
		if($query->num_rows() == 1) {
			$row = $query->row_array();
			$query->free_result();
			return array(
						'aid'		=>	$aid,
						'type'		=>	$row['type'],
						'type_name'	=>	$this->article_type_m->get_name($row['type']),
						'title'		=>	$row['title'],
						'content'	=>	$row['content'],
						'add_date'	=>	$row['add_date'],
						'add_time'	=>	$row['add_time'],
						'add_user'	=>	$row['add_user'],
					);
		}
		return FALSE;
	}
	
	/**
	 * 获取文章列表，不包括文章内容字段
	 * 
	 * @param integer $num
	 * @param integer $offset
	 * @param integer $type
	 * @param string $order
	 */
	public function get_list($limit, $offset = 0, $type = 0, $order = 'aid DESC')
	{
		$i = 0;
		$return = array();
		if($type > 0) {
			$this->db->where('type', (int) $type);
		}
		$this->db->select('aid, type, title, add_time, add_date, add_user');
		$this->db->order_by($order);
		$query = $this->db->get('article', $limit, $offset);
		foreach ($query->result_array() as $row) {
			$return[$i] = $row;
			$return[$i]['type_name'] = $this->article_type_m->get_name($row['type']);
			++$i;
		}
		return $return;
	}
	
	public function set_list_type($type = 0) 
	{
		if($type != 0) {
			$this->db->where('type', $type);
		}
		return $this;
	}
	
	/**
	 * 
	 * @param integer $type
	 * @param string $name_keyword
	 * @param string $content_keyword
	 * @return integer 文章总数
	 * @todo 完成标题关键字，和内容关键字查询
	 */
	public function get_num($type = 0, $name_keyword = '', $content_keyword = '') 
	{
		if($type != 0) {
			$this->db->where('type', $type);
		}
		if($name_keyword != '') {
			$this->db->like('title', $name_keyword);
		}
		if($content_keyword != '') {
			
		}
		return $this->db->count_all_results('article');
	}
	
	public function get_search($keyword = '', $limit, $offset = 0, $type = 0) 
	{
		$return = array();
		$i = 0;
		$this->db->select('aid, type, title, add_time, add_date, add_user');
		$this->db->like('title', $keyword);
		$this->db->order_by('aid DESC');
		if($type != 0) {
			$this->db->where('type', $type);
		}
		$query = $this->db->get('article', $limit, $offset);
		foreach ($query->result_array() as $row) {
			$return[$i] = $row;
			$return[$i]['type_name'] = $this->article_type_m->get_name($row['type']);
			++$i;
		}
		return $return;
	}
	
	public function add($title, $type, $content, $add_user) 
	{
		if($this->article_type_m->get_name($type) === FALSE) {
			return FALSE;
		}
		$data = array(
					'title'		=>	$title,
					'type'		=>	$type,
					'content'	=>	$content,
					'add_date'	=>	date('Y-m-d', time()),
					'add_time'	=>	time(),
					'add_user'	=>	$add_user,
				);
		if($this->db->insert('article', $data) === FALSE) {
			return FALSE;
		}
		return $this->db->insert_id();
	}
	
	public function edit($aid, $data) 
	{
		$aid = (int) $aid;
		$this->db->where('aid', $aid);
		$this->db->update('article', $data);
	}
	
	public function del($aid) 
	{
		$this->db->where('aid', $aid);
		if($this->db->delete('article') === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
}
