<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller 
{	
	/**
	 * 构造函数，防止index函数变成构造函数
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('article_m');
		$this->load->model('index_img_m');
		$this->load->model('teacher_m');
		$this->load->model('link_m');
		$this->load->model('project_m');
		$this->load->model('activity_m');
		$this->load->model('course_m');
		$this->load->helper('url');
		
		
	}

	/**
	 * 首页
	 */
	public function index() 
	{
		/*$data['news'] = $this->article_m->get_list(8, 0, 2);
		$data['notice'] = $this->article_m->get_list(8, 0, 9);
		$data['ad_img'] = $this->index_img_m->get_list(Index_img_m::IMG_BANNER);
		$data['ad_img_num'] = count($data['ad_img']);*/
		$data['links'] = $this->link_m->get_list();
		
		$data['news'] = $this->article_m->get_list(8, 0, 2);
		$data['teachers'] = $this->teacher_m->get_index_list(7);
		$data['projects'] = $this->project_m->get_index_list(4);
		$data['activities'] = $this->activity_m->get_index_list(4);
		$data['courses'] = $this->course_m->get_index_list(5);
		
		
		// $this->load->view('header.php');
		$this->load->view('new_index.php', $data);
		// $this->load->view('footer.php');
		//$this->load->view('new_index.php');
	}
}
