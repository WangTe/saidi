<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller 
{	
	/**
	 * 构造函数，防止index函数变成构造函数
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('article_m');
		$this->load->model('index_img_m');
		$this->load->model('link_m');
		$this->load->model('teacher_m');
		$this->load->model('course_m');
		$this->load->model('project_m');
		
	}

	/**
	 * 首页
	 */
	public function index() 
	{
		$id = (int) $this->input->get('id');
		$data['news'] = $this->article_m->get_list(8, 0, 2);
		$data['notice'] = $this->article_m->get_list(8, 0, 9);
		$data['ad_img'] = $this->index_img_m->get_list(Index_img_m::IMG_BANNER);
		$data['ad_img_num'] = count($data['ad_img']);
		$data['links'] = $this->link_m->get_list();
		$data['teacher'] = $this->teacher_m->get($id);
		$data['courses'] = $this->course_m->get_index_list(8);
		$data['projects'] = $this->project_m->get_index_list(8);
		
		
		$this->load->view('header.php', $data);
		$this->load->view('teacher_info.php', $data);
		$this->load->view('info_right.php', $data);
		$this->load->view('footer.php');
		//$this->load->view('new_index.php');
		
		
	}
}