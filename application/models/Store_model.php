<?php
class Store_model extends CI_Model
{

	public function generate_otp($param)
	{
		$par['mobile']    = $param['mobile'];

		$this->db->select('mobile,otp');
		$query = $this->db->get_where('user_otp', array('mobile' => intval($par['mobile'])), 1);
		$result = $query->result_array();
		if (count($result)) {
			return $result[0];
		} else {
			$par['otp']  = rand(1, 99999);
			if ($this->db->insert('user_otp', $par)) {
				return array('mobile' => intval($par['mobile']), 'otp' => $par['otp']);
			} else {
				return false;
			}
		}
	}

	public function verify_otp($param)
	{
		$par['mobile'] = intval($param['mobile']);
		$par['otp']  = intval($param['otp']);
		$this->db->select('mobile,otp');
		$query = $this->db->get_where('user_otp', array('mobile' => intval($par['mobile']), 'otp' => intval($par['otp'])), 1);
		$result = $query->result_array();
		if (count($result)) {
			$par_user['mobile'] = intval($par['mobile']);
			if ($this->db->insert('user', $par_user)) {

				$uid = $this->db->insert_id();
				if ($uid) {
					$this->db->where('mobile', intval($par['mobile']));
					$this->db->delete('user_otp');
				}
				return array('uid' => $uid);
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function register_store($param)
	{
		$uid = intval($param['uid']);
		$par_update['store_name']  = $param['store_name'];

		if ($this->db->update('user', $par_update, array('uid' => $uid))) {
			return true;
		} else {
			return false;
		}
	}

	public function add_store_content($param)
	{
		$par_insert['uid'] = intval($param['uid']);
		$par_insert['data']  = $param['data'];

		if ($this->db->insert('content', $par_insert)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_store_content($param)
	{
		$store_name = $param['store_name'];
		
		$this->db->select('*');
		$this->db->from('content');
		$this->db->join('user', 'content.uid = user.uid');
		
		if($store_name) {
			$this->db->where('user.store_name', $store_name);
		}
		
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}
}
