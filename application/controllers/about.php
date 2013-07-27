<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller 
{	
	/**
	 * 构造函数
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('about_m');
	}

	/**
	 * 首页
	 */
	public function index() 
	{
		$aid = (int) $this->input->get('aid');
		
		$data['about'] = $this->about_m->get($aid);

		$left_navi['title'] = '关于我们';
		$abouts = $this->about_m->get_list();
		$i = 0;
		foreach ($abouts as $about) {
			$left_navi['types'][$i]['tid'] = $about['aid'];
			$left_navi['types'][$i]['type'] = $about['type'];
			++$i;
		}
		
		if($aid == FALSE) {
			$data['about'] = $abouts[0];	
		}
		
		$this->load->view('header.php');
		$this->load->view('img_1.php', array('img'	=>	7));
		$this->load->view('left_navi.php', $left_navi);
		$this->load->view('about.php', $data);
		$this->load->view('footer.php');
	}
}
