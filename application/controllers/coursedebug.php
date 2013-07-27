<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coursedebug extends CI_Controller
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
		$this->load->model('course_m');
	}

	/**
	 * 首页
	 */
	public function index()
	{
		$data['news'] = $this->article_m->get_list(8, 0, 2);
		$data['notice'] = $this->article_m->get_list(8, 0, 9);
		$data['ad_img'] = $this->index_img_m->get_list(Index_img_m::IMG_BANNER);
		$data['ad_img_num'] = count($data['ad_img']);
		$data['links'] = $this->link_m->get_list();
		$data['courses'] = $this->course_m->get_list(16, 0);
		
		
		$this->load->view('header.php', $data);
		$this->load->view('courselist.php', $data);
		$this->load->view('info_right.php', $data);
		$this->load->view('footer.php');
		//$this->load->view('new_index.php');
	}
}