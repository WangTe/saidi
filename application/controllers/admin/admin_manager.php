<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台用户管理的控制类
 * 
 * @author 风格独特
 */

class Admin_manager extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_user_m');
		if($this->admin_user_m->check_login() === FALSE) {
			redirect('/admin/index');
		}
		$this->load->helper('form');
	}
	
	public function index()
	{
		$per_page = 10;
		$p = (int) $this->input->get('p');
		if($p < 1) {
			$p = 1;
		}
		
		$data['users'] = $this->admin_user_m->get_list($per_page, ($p - 1) * $per_page);
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/admin_user.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function add() 
	{
		$data['username'] = $username = $this->input->post('username', TRUE);
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$data['name'] = $name = $this->input->post('name', TRUE);
		$data['power'] = $power = (int) $this->input->post('power', TRUE);
		
		if($password != $password2) {
			$data['error'] = '两次输入密码不相同';
		} elseif ($password == '') {
			$data['error'] = '密码不能为空';
		} elseif ($this->admin_user_m->add_user($username, $password, $name, $power) === FALSE) {
			$data['error'] = '用户名已被使用';
		} else {
			redirect('/admin/admin_manager');
		}
		
		$data['shops'] = $this->shops_m->get_all();
		$data['form_url'] = '/admin/admin_manager/add';
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/admin_user_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit()
	{	
		$uid = (int) $this->input->get('uid');
		
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$data['name'] = $name = $this->input->post('name', TRUE);
		$data['power'] = $power = (int) $this->input->post('power', TRUE);
		
		if($password != $password2) {
			$data['error'] = '两次输入密码不相同';
		} else {
			if($password != '') {
				$data['password'] = $password;
			}
			$this->admin_user_m->edit_user($uid, $data);
			redirect('/admin/admin_manager');
		}
		
		$user = $this->admin_user_m->get($uid);
		$data['username'] = $user['username'];
		$data['shops'] = $this->shops_m->get_all();
		$data['form_url'] = '/admin/admin_manager/add';
		$data['action'] = 'edit';
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/admin_user_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit_pass() 
	{
		$uid = $this->admin_user_m->user->uid;
		
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		
		if($password == FALSE) {
			$data['error'] = '';	
		} elseif($password != $password2) {
			$data['error'] = '两次输入密码不相同';
		} elseif ($password == '') {
			$data['error'] = '密码不能为空';
		} else {
			$user['password'] = $password;
			$this->admin_user_m->edit_user($uid, $user);
			$data['error'] = '修改密码成功';
		}
		
		$data['form_url'] = '/admin/admin_manager/edit_pass';
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/edit_pw.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function del()
	{
		$uid = (int) $this->input->get('uid');
		if($uid < 1) {
			redirect('/admin/admin_manager');
		}
		$this->admin_user_m->del_user($uid);
		redirect('/admin/admin_manager');
	}
	
	public function add_v()
	{
		$data['username'] = '';
		$data['shop'] = '';
		$data['name'] = '';
		$data['power'] = 0;
		$data['form_url'] = '/admin/admin_manager/add';
		
		$data['shops'] = $this->shops_m->get_all();
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/admin_user_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit_v()
	{
		$uid = (int) $this->input->get('uid');
		$data = $this->admin_user_m->get($uid);
		$data['action'] = 'edit';
		if($data === FALSE) {
			redirect('/admin/admin_manager');
		}

		$data['form_url'] = '/admin/admin_manager/edit/?uid=' . $uid;
		$data['shops'] = $this->shops_m->get_all();
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/admin_user_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	private function _page_init($per_page)
	{
		$this->load->library('pagination');

		$config['total_rows'] = $this->admin_user_m->get_num($type);
		$config['per_page'] = $per_page;
		$config['base_url'] = '/admin/admin_manager/?';
		$config['num_links'] = 10;
		$config['query_string_segment'] = 'p';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
	
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}
