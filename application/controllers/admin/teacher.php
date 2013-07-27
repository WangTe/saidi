<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 讲师管理的控制器
 * 
 * @author 风格独特
 */

class Teacher extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_user_m');
		if($this->admin_user_m->check_login() === FALSE) {
			redirect('/admin/index');
		}
		$this->load->model('teacher_m');
		$this->load->helper('form');
	}

	public function index()
	{
		$per_page = 20;
		$p = (int) $this->input->get('p');
		if($p < 1) {
			$p = 1;
		}
	
		$data['teachers'] = $this->teacher_m->get_list($per_page, ($p - 1) * $per_page);
		$data['page_html'] =  $this->_page_init($per_page);
	
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/teacher.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	private function _page_init($per_page, $recomand=0)
	{
		$this->load->library('pagination');
	
		$config['total_rows'] = $this->teacher_m->get_num();
		$config['per_page'] = $per_page;
		$config['base_url'] = '/admin/teacher/?';
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
	
	public function del() 
	{
		$id = (int) $this->input->get('id');
		if($id > 0) {
			$this->teacher_m->del($id);
		}
		redirect('/admin/teacher/');
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
		//上传图片
		$teacher_pic = new Uploader_ue( "upfile" , $config);
		$info = $teacher_pic->getFileInfo();
		if($info['state'] == 'SUCCESS') {
			$data['photo'] = $make_url . $info['url'];
		}
		
		
		$id = (int) $this->input->get('id');
		$data['name'] = $this->input->post('name', TRUE) . '';
		$data['position'] = $this->input->post('position', TRUE) . '';
		$data['quality'] = $this->input->post('quality', TRUE) . '';		
		$data['intro'] = $this->input->post('ue_content') . '';
		$data['index'] = $this->input->post('index', TRUE);

		$this->teacher_m->edit($id, $data);
		redirect('/admin/teacher/');
	}
	
	public function add()
	{
		$make_url = $this->config->item('admin_upload');
		
		$this->load->library('uploader_ue');
		$config = array(
				"savePath" => "upload/" ,
				"maxSize" => 100000 , //单位KB
				"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp", '.PNG'  )
		);
		//上传图片
		$teacher_pic = new Uploader_ue( "upfile" , $config);
		$info = $teacher_pic->getFileInfo();
		if($info['state'] == 'SUCCESS') {
			$data['photo'] = $make_url . $info['url'];
		}
		
		$data['name'] = $this->input->post('name', TRUE) . '';
		$data['position'] = $this->input->post('position', TRUE) . '';
		$data['quality'] = $this->input->post('quality', TRUE) . '';		
		$data['intro'] = $this->input->post('ue_content') . '';
		$data['index'] = $this->input->post('index', TRUE);
		$data['add_time'] = time();
		
		$this->teacher_m->add($data);
		redirect('/admin/teacher/');
	}
	public function edit_v()
	{
		$id = (int) $this->input->get('id');
		if($id < 0) {
			redirect('/admin/teacher/');
		}
		$data = $this->teacher_m->get($id);
		$data['form_url'] = '/admin/teacher/edit/?id='. $id;
	
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/teacher_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function add_v()
	{
		$data['name'] = '';
		$data['position'] = '';
		$data['quality'] = '';		
		$data['intro'] ='';
		$data['index'] = 0;
		
		$data['form_url'] = '/admin/teacher/add';
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/teacher_add.php', $data);
		$this->load->view('admin/footer.php');
	}
}