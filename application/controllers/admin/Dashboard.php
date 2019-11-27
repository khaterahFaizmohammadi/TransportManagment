<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin')) { 
            redirect('login');
		}
		
		$this->session->userdata('lang');
		
		$this->load->model('model_vehicle');
        $this->load->model('model_manufacturer');
        $this->load->model('model_car_model');
        $this->load->model('model_employee');
	}

	public function index()
	{
		$lang = $this->session->userdata('lang');
        if($lang=="persion"){
            $data['lang']['total_vehicle'] = 'همه ماشین ها';
            $data['lang']['total_employee'] = 'همه کارمندان';
            $data['lang']['total_custommer'] = 'همه مشتریان';
            $data['lang']['total_sold'] = 'همه فروشات';
			
        }else{
            $data['lang']['total_vehicle'] = 'Total Vehicles';
            $data['lang']['total_employee'] = 'Total Employee';
            $data['lang']['total_custommer'] = 'Total Custommer';
            $data['lang']['total_sold'] = 'Total Sold';   
        }

        $data['vehicles'] = $this->model_vehicle->getAll();
        $data['customers'] = $this->model_vehicle->customerList();
        $data['manufacturers_group'] = $this->model_vehicle->getAllByManufacturer();
        $data['manufacturers_group_sold'] = $this->model_vehicle->getAllByManufacturerSold();
        
        // $data['vehicle_by_month'] = $this->model_vehicle->get_vehicle_by_month();

        $data['employees'] = $this->model_employee->getAll();
    	$data['user'] = $this->session->userdata;

    	// die(var_dump($data['manufacturers_group']));

    	$this->parser->parse('admin/view_index', $data);
	}

	public function logout()
	{

	       $this->session->sess_destroy();
	       redirect('login');
	}
}
