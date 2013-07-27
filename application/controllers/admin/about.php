<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 关于我们的控制类
 * 
 * @author 风格独特
 */

class About extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_user_m');
		if($this->admin_user_m->check_login() === FALSE) {
			redirect('/admin/index');
		}
		$this->load->model('about_m');
		$this->load->helper('form');
	}
	
	public function index() 
	{
		$data['abouts'] = $this->about_m->get_list(); 
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/about.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function add() 
	{
		$type = $this->input->post('type', TRUE);
		$title = $this->input->post('title', TRUE);
		$content = $this->input->post('ue_content');
		
		$this->about_m->add($type, $title, $content);
		redirect('/admin/about');
	}
	
	public function edit() 
	{
		$aid = (int) $this->input->get('aid');
		$data['title'] = $this->input->post('title', TRUE);
		$data['type'] = $this->input->post('type', TRUE);
		$data['content'] = $this->input->post('ue_content');
		if($data['title'] === FALSE || $data['type'] === FALSE || $data['content'] === FALSE) {
			redirect('/admin/about');
		}
		$this->about_m->edit($aid, $data);
		redirect('/admin/about');
	}
	
	public function del() 
	{
		$aid = (int) $this->input->get('aid');
		if($aid < 1) {
			redirect('/admin/about');
		}
		$this->about_m->del($aid);
		redirect('/admin/about');
	}
	
	public function add_v() 
	{
		$data['type'] = '';
		$data['title'] = '';
		$data['content'] = '';
		$data['form_url'] = '/admin/about/add';
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/about_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit_v() 
	{
		$aid = (int) $this->input->get('aid');
		$about = $this->about_m->get($aid);
		if($about === FALSE) {
			redirect('/admin/about');
		}
		$data['type'] = $about['type'];
		$data['title'] = $about['title'];
		$data['content'] = $about['content'];
		$data['form_url'] = '/admin/about/edit/?aid=' . $aid;
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/about_add.php', $data);
		$this->load->view('admin/footer.php');
	}
}