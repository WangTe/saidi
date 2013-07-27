<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 项目管理的控制器
 * 
 * @author 风格独特
 */

class Project extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_user_m');
		if($this->admin_user_m->check_login() === FALSE) {
			redirect('/admin/index');
		}
		$this->load->model('project_m');
		$this->load->helper('form');
	}

	public function index()
	{
		$per_page = 20;
		$p = (int) $this->input->get('p');
		if($p < 1) {
			$p = 1;
		}
	
		$data['projects'] = $this->project_m->get_list($per_page, ($p - 1) * $per_page);
		$data['page_html'] =  $this->_page_init($per_page);
	
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/project.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	private function _page_init($per_page, $recomand=0)
	{
		$this->load->library('pagination');
	
		$config['total_rows'] = $this->project_m->get_num();
		$config['per_page'] = $per_page;
		$config['base_url'] = '/admin/project/?';
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
			$this->project_m->del($id);
		}
		redirect('/admin/project/');
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
		$project_pic = new Uploader_ue( "upfile" , $config);
		$info = $project_pic->getFileInfo();
		if($info['state'] == 'SUCCESS') {
			$data['photo'] = $make_url . $info['url'];
		}
		
		
		$id = (int) $this->input->get('id');
		$data['name'] = $this->input->post('name', TRUE) . '';
		$data['content'] = $this->input->post('ue_content') . '';
		$data['index'] = $this->input->post('index', TRUE);

		$this->project_m->edit($id, $data);
		redirect('/admin/project/');
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
		$project_pic = new Uploader_ue( "upfile" , $config);
		$info = $project_pic->getFileInfo();
		if($info['state'] == 'SUCCESS') {
			$data['photo'] = $make_url . $info['url'];
		}
		
		$data['name'] = $this->input->post('name', TRUE) . '';
		$data['content'] = $this->input->post('ue_content') . '';
		$data['index'] = $this->input->post('index', TRUE);
		$data['add_time'] = time();
		
		$this->project_m->add($data);
		redirect('/admin/project/');
	}
	public function edit_v()
	{
		$id = (int) $this->input->get('id');
		if($id < 0) {
			redirect('/admin/project/');
		}
		$data = $this->project_m->get($id);
		$data['form_url'] = '/admin/project/edit/?id='. $id;
	
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/project_add.php', $data);
		$this->load->view('admin/footer.php');
	}
	
	public function add_v()
	{
		$data['name'] = '';
		$data['content'] ='';
		$data['index'] = 0;
		
		$data['form_url'] = '/admin/project/add';
		
		$this->load->view('admin/header.php', array('username' => $this->admin_user_m->user->username));
		$this->load->view('admin/left_navi.php');
		$this->load->view('admin/project_add.php', $data);
		$this->load->view('admin/footer.php');
	}
}