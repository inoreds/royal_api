<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_data extends CI_Model {

	public function get_data()
    {
	    $get  = $this->db->query("select r.noreg, r.norm, nama from rd_reg r, pasien p where r.norm = p.norm and tgldatang='2017-01-02'");
	    
	    return $get->result();
    }

    
	

}