<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
    	$date = date('Y-m-d');

	    $this->db->select('*');
		$this->db->from('arm_register');
		$this->db->join('afarm_mstpasien', 'arm_register.norm = afarm_mstpasien.norm');
		$this->db->join('afarm_customer', 'arm_register.custno = afarm_customer.custno','inner');
		$this->db->join('arm_registertujuan', 'arm_register.noreg = arm_registertujuan.noreg','inner');
		$this->db->join('afarm_unitlayanan', 'arm_registertujuan.regtujuan = afarm_unitlayanan.kodeunit','inner');
		$this->db->where(array('afarm_unitlayanan.ket' => 'RSPG'));
		$this->db->where(array('arm_registertujuan.regtujuan' => ''));
		$this->db->like(array('(CONVERT(date, arm_register.tanggal))' => $date));
		$query = $this->db->get();
		
	    return $query->result();
    }

    public function getAllDataPoli()
    {
	    $get  = $this->db->query("Select * From afarm_unitlayanan where afarm_unitlayanan.ket = 'RSPG'");
	    return $get->result();
    }

    public function getAllDataUnit($unit)
    {
    	$date = date('Y-m-d');

    	if ($unit == 'semua')
    	{
    		$this->db->select('*');
			$this->db->from('arm_register');
			$this->db->join('afarm_mstpasien', 'arm_register.norm = afarm_mstpasien.norm');
			$this->db->join('afarm_customer', 'arm_register.custno = afarm_customer.custno','inner');
			$this->db->join('arm_registertujuan', 'arm_register.noreg = arm_registertujuan.noreg','inner');
			$this->db->join('afarm_unitlayanan', 'arm_registertujuan.regtujuan = afarm_unitlayanan.kodeunit','inner');
			$this->db->where(array('afarm_unitlayanan.ket' => 'RSPG'));
			$this->db->like(array('(CONVERT(date, arm_register.tanggal))' => $date));
			$query = $this->db->get();
    	}
    	else
    	{
    		$this->db->select('*');
			$this->db->from('arm_register');
			$this->db->join('afarm_mstpasien', 'arm_register.norm = afarm_mstpasien.norm');
			$this->db->join('afarm_customer', 'arm_register.custno = afarm_customer.custno','inner');
			$this->db->join('arm_registertujuan', 'arm_register.noreg = arm_registertujuan.noreg','inner');
			$this->db->join('afarm_unitlayanan', 'arm_registertujuan.regtujuan = afarm_unitlayanan.kodeunit','inner');
			$this->db->where(array('afarm_unitlayanan.ket' => 'RSPG'));
			$this->db->where(array('arm_registertujuan.regtujuan' => $unit));
			$this->db->like(array('(CONVERT(date, arm_register.tanggal))' => $date));
			$query = $this->db->get();
    	}
	    return $query->result();
    }

    public function getAllDataSeluruh($unit,$tgl)
    {
    	$tgl_ubah = date('Y-m-d', strtotime($tgl));
    	
    	if ($unit == 'semua')
    	{
    		$this->db->select('*');
			$this->db->from('arm_register');
			$this->db->join('afarm_mstpasien', 'arm_register.norm = afarm_mstpasien.norm');
			$this->db->join('afarm_customer', 'arm_register.custno = afarm_customer.custno','inner');
			$this->db->join('arm_registertujuan', 'arm_register.noreg = arm_registertujuan.noreg','inner');
			$this->db->join('afarm_unitlayanan', 'arm_registertujuan.regtujuan = afarm_unitlayanan.kodeunit','inner');
			$this->db->where(array('afarm_unitlayanan.ket' => 'RSPG'));
			$this->db->like(array('(CONVERT(date, arm_register.tanggal))' => $tgl_ubah));
			$query = $this->db->get();
    	}
    	else
    	{
    		$this->db->select('*');
			$this->db->from('arm_register');
			$this->db->join('afarm_mstpasien', 'arm_register.norm = afarm_mstpasien.norm');
			$this->db->join('afarm_customer', 'arm_register.custno = afarm_customer.custno','inner');
			$this->db->join('arm_registertujuan', 'arm_register.noreg = arm_registertujuan.noreg','inner');
			$this->db->join('afarm_unitlayanan', 'arm_registertujuan.regtujuan = afarm_unitlayanan.kodeunit','inner');
			$this->db->where(array('afarm_unitlayanan.ket' => 'RSPG'));
			$this->db->where(array('arm_registertujuan.regtujuan' => $unit));
			$this->db->like(array('(CONVERT(date, arm_register.tanggal))' => $tgl_ubah));
			$query = $this->db->get();
    	}
	    return $query->result();
    }
}