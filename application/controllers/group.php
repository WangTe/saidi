<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller 
{	
	/**
	 * 构造函数
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('group_m');
	}

	/**
	 * 首页
	 */
	public function index() 
	{
		$gid = (int) $this->input->get('gid');
		$data = $this->group_m->get($gid);
		$data['type_name'] = $this->group_m->get_typename($data['type']);
		
		$this->load->view('header.php');
		$this->load->view('img_1.php', array('img'	=>	4));
		if($data['type'] == 3) {
			$this->load->view('left_alumni.php');
		} else {
			$this->load->view('left_group.php');
		}
		$this->load->view('group.php', $data);
		$this->load->view('footer.php');
	}
	
	public function type() 
	{
		$per_page = 10;
		$type = (int) $this->input->get('type');
		$p = (int) $this->input->get('p');
		if($p < 1) {
			$p = 1;
		}
		if($type < 1) {
			$type = 1;
		}
		
		$data['groups'] = $this->group_m->get_list($per_page, $per_page * ($p - 1), $type);
		$data['page_html'] =  $this->_page_init($per_page);
		$data['title'] = $this->group_m->get_typename($type);
		$data['type'] = $type;
		
		$this->load->view('header.php');
		$this->load->view('img_1.php', array('img'	=>	4));
		if($data['type'] == 3) {
			$this->load->view('left_alumni.php');
		} else {
			$this->load->view('left_group.php');
		}
		$this->load->view('group_list.php', $data);
		$this->load->view('footer.php');
	}
	
	private function _page_init($per_page)
	{
		$this->load->library('pagination');
	
		$type = (int) $this->input->get('type');
		if($type < 1) {
			$type = 1;
		}
		
		$config['total_rows'] = $this->group_m->get_num($type);
	
		$config['per_page'] = $per_page;
		$config['base_url'] = base_url('group/type/?type=' . $type);
		$config['num_links'] = 20;
		$config['query_string_segment'] = 'p';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['use_page_numbers'] = TRUE;
	
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}
