<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function index()
	{

		if($this->session->userdata("logged_in")!="")
		{
			$unit = $this->input->post('dataTablePoli');
			
			$tgltoday = date('d-M-Y');

			$tgl = $this->input->post('tgl_ubah');

			$this->load->model('/app_load_data_table');

			if($unit == '')
			{
				$d['dataTable'] = $this->app_load_data_table->getAllData();
			}
			elseif($unit <> '')
			{
				if($tgl == '')
				{
					$d['dataTable'] = $this->app_load_data_table->getAllDataUnit($unit);
					
				}
				else
				{
					$d['dataTable'] = $this->app_load_data_table->getAllDataSeluruh($unit,$tgl);
				}
			}

			$d['dataTablePoli'] = $this->app_load_data_table->getAllDataPoli();

			$d['tgl_ubah'] = "";

			$d['username']	= $this->session->userdata("username");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('dashboard/bg_home', $d);		
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			$this->load->view('login/login');
		}
	}

	function getDataAll()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData();

		print json_encode($dataTable);
	}

	function getDataAllPoli()
	{
		$this->load->model('/app_load_data_table');
		$dataTablePoli = $this->app_load_data_table->getAllDataPoli();

		print json_encode($dataTablePoli);
	}

	function getDataAllUnit()
	{
		$unit = $this->input->post("unit");
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllDataUnit($unit);

		print json_encode($dataTable);
	}

	function getDataAllSeluruh()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllDataSeluruh($unit,$tgl);

		print json_encode($dataTable);
	}
}