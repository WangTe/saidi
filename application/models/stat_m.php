<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 统计部分模型层
 * 
 * @author 风格独特
 */

class Stat_m extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function log($data)
	{
		$data['time'] = time();
		$this->_pv_log($data['session'], $data['ip']);
		if($this->db->insert('access_log', $data) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	public function get_session() {
		$uv_session = $this->input->cookie('uv_session', TRUE);
		if($uv_session != FALSE) {
			return $uv_session;
		}
		$uv_session = md5(time() . mt_rand(1000000, 9999999));
		$this->input->set_cookie('uv_session', $uv_session, 3600 * 24 * 365, '', '/');
		return $uv_session;
	}
	
	private function _pv_log($uv_session, $ip)
	{
		$today = mktime(0, 0, 0);
		$now = time();
		$date = date('Y-m-d', $now);
		$this->db->where('date', $date);
		$query = $this->db->get('access_pv');
		if($query->num_rows() < 1) {
			$data = array(
						'pv'	=>	1,
						'ip'	=>	1,
						'uv'	=>	1,
						'date'	=>	$date,
					);
			if($this->db->insert('access_pv', $data) === FALSE) {
				return FALSE;
			}
			return TRUE;
		}
		$row = $query->row_array();
		// 判断IP当日是否已经记录
		$ip_count = $row['ip'];
		$this->db->where('ip', $ip);
		$this->db->where('time >', $today);
		$num = $this->db->count_all_results('access_log');
		if($num < 1) {
			++$ip_count;
		}
		// 判断UV当日是否已经记录
		$uv_count = $row['uv'];
		$this->db->where('session', $uv_session);
		$this->db->where('time >', $today);
		$num = $this->db->count_all_results('access_log');
		if($num < 1) {
			++$uv_count;
		}
		
		// 更新记录
		$data = array(
					'pv'	=>	$row['pv'] + 1,
					'ip'	=>	$ip_count,
					'uv'	=>	$uv_count,
				);
		$this->db->where('date', $date);
		if($this->db->update('access_pv', $data) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	public function pv_today()
	{
		$date = date('Y-m-d', time());
		$this->db->where('date', $date);
		$query = $this->db->get('access_pv');
		if($query->num_rows() < 1) {
			$data = array(
					'pv'	=>	1,
					'ip'	=>	1,
					'uv'	=>	1,
					'date'	=>	$date,
			);
			if($this->db->insert('access_pv', $data) === FALSE) {
				return 0;
			}
			return 1;
		}
		$row = $query->row_array();
		return $row['pv'];
	}
	
	public function pv_crt_month()
	{
		$month = date('Y-m-1', time());
		$this->db->select_sum('pv', 'pv_month');
		$this->db->where('date >=', $month);
		$query = $this->db->get('access_pv');
		$row = $query->row_array();
		if(isset($row['pv_month'])) {
			return $row['pv_month'];
		}
		return 0;
	}
	
	public function pv_all()
	{
		$this->db->select_sum('pv', 'pv_all');
		$query = $this->db->get('access_pv');
		$row = $query->row_array();
		if(isset($row['pv_all'])) {
			return $row['pv_all'];
		}
		return 0;
	}
}