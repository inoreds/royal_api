<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function cekUserLogin($data)
	{
		$second_db 			= $this->load->database('second', TRUE);
		$cek['user1'] 		= $data['username'];
		$cek['PASS2'] 		= $data['password'];
		$q_cek_login 		= $second_db->get_where('TBLuser', $cek);
		
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['nama_user_login'] = $qad->NamaUser;
				$sess_data['id_pengguna'] = $qad->indek;
				$sess_data['username'] = $qad->user1;
				$sess_data['level'] = $qad->grpuser;
				$this->session->set_userdata($sess_data);
			}
			redirect("dashboard");
		}
		else
		{
			$data = new stdClass();   
			$data->error = 'Wrong username or password.';
			
			$this->session->sess_destroy();
			$this->load->view('login/login', $data);
		}
		
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */