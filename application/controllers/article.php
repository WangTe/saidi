<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller 
{	
	/**
	 * 构造函数
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('article_m');
		
	}

	/**
	 * 首页
	 */
	public function index() 
	{
		$aid = (int) $this->input->get('aid');
		$data['article'] = $this->article_m->get($aid);
		
		
		$this->load->view('header.php');
		$this->load->view('img_1.php', array('img'	=>	1));
		/*if(isset($data['article']['type']) && $data['article']['type'] == 6) {
			$this->load->view('left_course.php');
		} elseif(isset($data['article']['type']) && $data['article']['type'] == 12) {
			$this->load->view('left_alumni.php');
		} elseif($data['article']['type'] == 13 || $data['article']['type'] == 14 || $data['article']['type'] == 15 || $data['article']['type'] == 16) {
			$this->load->view('left_policy.php');
		} else {
			$this->load->view('left_news.php');
		}*/
		$this->load->view('article.php', $data);
		$this->load->view('footer.php');
	}
	
	public function type() 
	{
		$per_page = 20;
		$type = (int) $this->input->get('type');
		$p = (int) $this->input->get('p');
		if($p < 1) {
			$p = 1;
		}
		if($type < 1) {
			$type = 2;
		}
		$this->load->model('course_m');
		$this->load->model('project_m');
		$this->load->model('article_type_m');		
		
		$data['news'] = $this->article_m->get_list($per_page, $per_page * ($p - 1), $type);
		$data['page_html'] =  $this->_page_init($per_page);
		$data['title'] = $this->article_type_m->get_name($type);		
		$data['courses'] = $this->course_m->get_list(8,0);
		$data['projects'] = $this->project_m->get_list(8,0);		
		
		$this->load->view('header.php');
		/*if($type == 6) {
			$this->load->view('left_course.php');
		} else if($type == 12) {
			$this->load->view('left_alumni.php');
		} elseif($type == 13 || $type == 14 || $type == 15 || $type == 16) {
			$this->load->view('left_policy.php');
		} else {
			$this->load->view('left_news.php');
		}*/
		
		$this->load->view('article_list.php', $data);
		$this->load->view('info_right.php', $data);		
		$this->load->view('footer.php');
	}
	
	function search() 
	{
		$per_page = 10;
		$p = (int) $this->input->get('p');
		$keyword = $this->input->get('keyword', TRUE);
		if($p < 1) {
			$p = 1;
		}
		
		$data['articles'] = $this->article_m->get_search($keyword, $per_page, $per_page * ($p - 1));
		$total_rows = $this->article_m->get_num(0, $keyword);
		$data['page_html'] =  $this->_page_init_search($per_page, $total_rows);
		$data['keyword'] = htmlspecialchars(urldecode($keyword));
		
		$this->load->view('header.php');
		$this->load->view('img_1.php', array('img'	=>	1));
		$this->load->view('search.php', $data);
		$this->load->view('footer.php');
	}
	
	private function _page_init($per_page)
	{
		$this->load->library('pagination');
		$type = (int) $this->input->get('type');
		if($type < 1) {
			$type = 2;
		}
	
		$config['total_rows'] = $this->article_m->get_num($type);
		$config['per_page'] = $per_page;
		$config['base_url'] = base_url('article/type/?type=' . $type);
		$config['num_links'] = 20;
		$config['query_string_segment'] = 'p';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['use_page_numbers'] = TRUE;
	
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
	
	private function _page_init_search($per_page, $total_rows)
	{
		$this->load->library('pagination');
		
		$keyword = $this->input->get('keyword', TRUE);
		
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['base_url'] = base_url('article/search/?keyword=' . $keyword);
		$config['num_links'] = 20;
		$config['query_string_segment'] = 'p';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['use_page_numbers'] = TRUE;
	
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}
