<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//test
class bridging_igd extends CI_Controller {

	function index() {

	}

	
	function get_data(){
		$this->load->model('/m_data');
		$dataTable = $this->m_data->get_data();

		print json_encode($dataTable);

	}

	
}
