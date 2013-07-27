<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 首页图片管理的控制类
 * 
 * @author 风格独特
 */

class Index_img extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_user_m');
		if($this->admin_user_m->check_login() === FALSE) {
			redirect('/admin/index');
		}
		$this->load->model('index_img_m');
		$this->load->helper('form');
	}
	
	public function index() 
	{
		$type = (int) $this->input->get('type');
		if($type == FALSE) {
			$type = Index_img_m::IMG_BANNER;
		}
		$data['imgs'] = $this->index_img_m->get_list($type);
		$data['type'] = $type;
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/index_img.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function add() 
	{
		$make_url = $this->config->item('admin_upload');
		
		$this->load->library('uploader_ue');
		$config = array(
				"savePath" => "upload/" ,
				"maxSize" => 100000 , //单位KB
				"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp"  )
		);
		$up = new Uploader_ue( "upfile" , $config );
		$info = $up->getFileInfo();
		
		$type =(int) $this->input->get('type');
		$path = $make_url . $info['url'];
		$order = (int) $this->input->post('order');
		$title = $this->input->post('title', TRUE);
		$url = $this->input->post('url', TRUE);
		
		$this->index_img_m->add($order, $type, $title, $url, $path);
		redirect('/admin/index_img/?type=' . $type);
	}
	
	public function edit()
	{
		$make_url = $this->config->item('admin_upload');
		
		$this->load->library('uploader_ue');
		$config = array(
				"savePath" => "upload/" ,
				"maxSize" => 100000 , //单位KB
				"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp"  )
		);
		$up = new Uploader_ue( "upfile" , $config);
		$info = $up->getFileInfo();
		if($info['state'] == 'SUCCESS') {
			$data['path'] = $make_url . $info['url'];
		}
		
		$id = (int) $this->input->get('id');
		$data['type'] = (int) $this->input->get('type');
		$data['title'] = $this->input->post('title', TRUE);
		$data['order'] = (int) $this->input->post('order');
		$data['url'] = $this->input->post('url', TRUE);

		$this->index_img_m->edit($id, $data);
		redirect('/admin/index_img/?type=' . $data['type']);
	}
	
	public function del()
	{
		$type = (int) $this->input->get('type');
		$id = (int) $this->input->get('id');
		if($id < 1) {
			redirect('/admin/index_img');
		}
		$this->index_img_m->del($id);
		redirect('/admin/index_img/?type=' . $type);
	}
	
	public function add_v()
	{
		$type = (int) $this->input->get('type');
		if($type == FALSE) {
			$type = Index_img_m::IMG_BANNER;
		}
		$data['order'] = '';
		$data['title'] = '';
		$data['url'] = '';
		$data['form_url'] = '/admin/index_img/add/?type=' . $type;
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/index_img_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit_v()
	{
		$id = (int) $this->input->get('id');
		$img = $this->index_img_m->get($id);
		if($img === FALSE) {
			redirect('/admin/index_img');
		}
		$data['type'] = $img['type'];
		$data['title'] = $img['title'];
		$data['url'] = $img['url'];
		$data['order'] = $img['order'];
		$data['form_url'] = '/admin/index_img/edit/?id=' . $id . '&type=' . $img['type'];
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/index_img_add.php', $data);
		$this->load->view('admin/footer.php');
	}
}