<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 调试用的控制器
 * 
 * @author 风格独特
 */

class Debug extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('load');
	}
	
	public function index()
	{
		/**
		 * config_m测试用
		 */
		/*$this->load->model('config_m');
		$this->config_m->item('aa', 'aaa');
		var_dump($this->config_m->item('aa'));*/
		
		// $this->load->model('admin_user_m');
		// $this->admin_user_m->add_user('wangte', '111111', '王特');
		// $this->admin_user_m->login('wang', '123456');
		// $this->admin_user_m->check_login();
		
		/*$data = array(
					'username'	=>	'wang',
					'password'	=>	'123456',
					'name'	=>	'哈哈'
				);
		$this->admin_user_m->edit_user(1, $data);*/
		// $this->admin_user_m->del_user(1);
		
		
		/*$this->load->library('pagination');
		
		$config['base_url'] = 'http://127.0.0.1/edp/www/?c=debug';
		$config['num_links'] = 10;
		$config['query_string_segment'] = 'p';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = 200;
		$config['per_page'] = 20;
		
		$this->pagination->initialize($config);
		
		$this->output->set_output( $this->pagination->create_links());*/
		/*$this->load->model('article_type_m');
		$this->article_type_m->add_type('aaaa', 19); */
		
		$data['a'] = 'aaaaaaaa';
		$data['b'] = 'bbbbbbbbbb';
		load_view(array('a', 'b'), $data);
	}
	
	public function test()
	{
		$this->load->model('config_m');
		$a = $this->config_m->item('aa');
		$data['aa'] = $a;
		$this->load->view('test', $data);
	}
}