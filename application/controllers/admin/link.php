<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 友情链接的控制类
 * 
 * @author 风格独特
 */

class Link extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_user_m');
		if($this->admin_user_m->check_login() === FALSE) {
			redirect('d=admin&c=index');
		}
		$this->load->model('link_m');
		$this->load->helper('form');
	}
	
	public function index() 
	{
		$data['links'] = $this->link_m->get_list(); 
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/link.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function add()
	{
		$name = $this->input->post('name', TRUE);
		$url = $this->input->post('url', TRUE);
		$title = $this->input->post('title', TRUE);
		
		$this->link_m->add($name, $url, $title);
		redirect('d=admin&c=link');
	}
	
	public function edit() 
	{
		$lid = (int) $this->input->get('lid');
		$data['name'] = $this->input->post('name', TRUE);
		$data['url'] = $this->input->post('url', TRUE);
		$data['title'] = $this->input->post('title', TRUE);
		if($data['title'] === FALSE || $data['type'] === FALSE || $data['content'] === FALSE) {
			redirect('d=admin&c=link');
		}
		$this->link_m->edit($lid, $data);
		redirect('d=admin&c=link');
	}
	
	public function del() 
	{
		$lid = (int) $this->input->get('lid');
		if($lid < 1) {
			redirect('d=admin&c=link');
		}
		$this->link_m->del($lid);
		redirect('d=admin&c=link');
	}
	
	public function add_v() 
	{
		$data['name'] = '';
		$data['url'] = '';
		$data['title'] = '';
		$data['form_url'] = 'd=admin&c=link&m=add';
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/link_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit_v() 
	{
		$lid = (int) $this->input->get('lid');
		$link = $this->link_m->get($lid);
		if($link === FALSE) {
			redirect('d=admin&c=link');
		}
		$data['name'] = $link['name'];
		$data['url'] = $link['url'];
		$data['title'] = $link['title'];
		$data['form_url'] = 'd=admin&c=link&m=edit&lid=' . $lid;
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/link_add.php', $data);
		$this->load->view('admin/footer.php');
	}
}