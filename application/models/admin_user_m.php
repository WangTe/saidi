<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 管理员用户管理
 * 
 * @author 风格独特
 */

/**
 * 管理员节点类
 * 
 * @author 风格独特
 */
class Admin_user
{
	public $uid = 0;
	public $username;
	public $name;
	public $power;
	
	/**
	 * 构造函数
	 * 
	 * @param integer $uid
	 */
	public function __construct() 
	{
		
	}
}

/**
 * 管理员模型层
 * 
 * @author 风格独特
 */
class Admin_user_m extends CI_Model
{
	/**
	 * 管理用户的表格
	 * 
	 * @var string
	 */
	private $table = 'admin_user';
	
	/**
	 * 当前登录的用户
	 * 
	 * @var Admin_user
	 */
	public $user;
	
	/**
	 * 构造函数，连接数据库
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
		$this->user = new Admin_user();
	}
	
	/**
	 * 用户登录函数
	 * 
	 * @param string $username
	 * @param string $password
	 * @return number
	 * 		-1,用户名不存在
	 * 		-2,密码错误
	 */
	public function login($username, $password)
	{
		$this->session->unset_userdata('uid');
		$this->db->select('uid, username, password, salt, name, power');
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		if($query->num_rows() < 1) {
			return -1;
		}
		$row = $query->row_array();
		$password = $this->_make_password($password, $row['salt']);
		if($password != $row['password']) {
			return -2;
		}
		$this->user->uid = $row['uid'];
		$this->user->username = $row['username'];
		$this->user->name = $row['name'];
		$this->user->power = $row['power'];
		
		$data = array(
					'uid'	=>	$this->user->uid
				);
		$this->session->set_userdata($data);
		return $this->user->uid;
	}
	
	public function logout() 
	{
		if($this->session->unset_userdata('uid') === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 检查是否登录
	 * 
	 * @return number
	 */
	public function check_login($setcookie = TRUE)
	{
		$uid = $this->session->userdata('uid');
		if($uid === FALSE) {
			return FALSE;
		}
		
		$this->db->select('username, name, power');
		$this->db->where('uid', $uid);
		$query = $this->db->get($this->table);
		if($query->num_rows() < 0) {
			return FALSE;
		}
		// 赋值
		$row = $query->row_array();
		$this->user->uid = $uid;
		$this->user->username = $row['username'];
		$this->user->name = $row['name'];
		$this->user->power = $row['power'];
		
		// 重新设置session
		if($setcookie === TRUE) {
			$this->session->unset_userdata('uid');
			$data = array(
						'uid'	=>	$this->user->uid
					);
			$this->session->set_userdata($data);
		}
		return $this->user->uid;
	}
	
	public function get($uid) 
	{
		$this->db->where('uid', $uid);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	
	public function get_list($limit, $offset = 0) 
	{
		$return = array();
		
		$this->db->order_by('uid ASC');
		$query = $this->db->get($this->table, $limit, $offset);
		$return = $query->result_array();
		return $return;
	}
	
	public function get_num() 
	{
		return $this->db->count_all_results($this->table);
	}
	
	/**
	 * 添加用户
	 * 
	 * @param string $username
	 * @param string $password
	 * @param string $name
	 * @return mixed
	 */
	public function add_user($username, $password, $name = '', $power = 0)
	{
		if($this->_get_userbyusername($username) != FALSE) {
			return FALSE;
		}
		$salt = $this->_make_salt();
		$password = $this->_make_password($password, $salt);
		$data = array(
					'username'	=>	$username,
					'password'	=>	$password,
					'salt'		=>	$salt,
					'name'		=>	$name,
					'power'		=>	$power
				);
		if($this->db->insert($this->table, $data) === FALSE) {
			return FALSE;
		}
		return $this->db->insert_id();
	}
	
	/**
	 * 
	 * @param integer $uid
	 * @param array $data
	 * @return bool
	 */
	public function edit_user($uid, $data) 
	{
		if(isset($data['password'])) {
			$data['salt'] = $this->_make_salt();
			$data['password'] = $this->_make_password($data['password'], $data['salt']);
		}
		$this->db->where('uid', $uid);
		if($this->db->update($this->table, $data) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 删除用户
	 * 
	 * @param integer $uid
	 */
	public function del_user($uid)
	{
		$this->db->where('uid', $uid);
		if($this->db->delete($this->table) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 通过uid获取用户信息
	 * 
	 * @param integer $uid
	 * @return multitype:array |boolean
	 */
	private function _get_userbyuid($uid)
	{
		$this->db->select('uid, username, name, power');
		$this->db->where('uid', $uid);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0) {
			$row = $query->row_array();
			return array(
						'uid'		=>	$row['uid'],
						'username'	=>	$row['username'],
						'name'		=>	$row['name'],
					);
		}
		return FALSE;
	}
	
	/**
	 * 通过用户名获取用户数据
	 * 
	 * @param string $username
	 * @return multitype:array |boolean
	 */
	private function _get_userbyusername($username)
	{
		$this->db->select('uid, username, name, power');
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0) {
			$row = $query->row_array();
			return array(
						'uid'		=>	$row['uid'],
						'username'	=>	$row['username'],
						'name'		=>	$row['name'],
					);
		}
		return FALSE;
	}
	
	/**
	 * 数据库密码生成函数
	 * 
	 * @param string $password
	 * @param string $salt
	 * @return string 返回生成的密码
	 */
	private function _make_password($password, $salt = '')
	{
		return md5(md5($password) . $salt);
	}
	
	/**
	 * salt生成函数
	 * 
	 * @param string $len salt的长度
	 */
	private function _make_salt($len = 6)
	{
		$min = pow(10, $len - 1);
		$max = pow(10, $len) - 1;
		return mt_rand($min, $max) . '';
	}
}
