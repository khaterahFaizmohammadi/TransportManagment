<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manufacturers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin') || $this->session->userdata('type')!="admin") { 
            redirect('controller_login');
        }
		
		$this->load->database();
		$this->load->model('model_manufacturer');
	}


	public function index()
	{	
		$lang = $this->session->userdata('lang');
        if($lang=="persion"){
			$data['lang']['title'] = 'سازنده ها';
			$data['lang']['title_header_all'] = 'همه سازنده ها';
			$data['lang']['title_header_add'] = 'اضافه کردن سازنده ها';
			$data['lang']['th_id'] = 'آیدی';
			$data['lang']['th_name'] = 'اسم';
			$data['lang']['th_logo'] = 'لوگو';
			$data['lang']['th_action'] = 'عملیات';
			$data['lang']['btn_delete'] = 'حذف';
			$data['lang']['tf_name'] = 'اسم';
			$data['lang']['tf_logo'] = 'لوگو';
			$data['lang']['btn_add'] = 'اضافه کردن';
		}else{
			$data['lang']['title'] = 'Manufacturers';
			$data['lang']['title_header_all'] = 'All Manufacturers';
			$data['lang']['title_header_add'] = 'Add new Manufacturers';
			$data['lang']['th_id'] = 'ID';
			$data['lang']['th_name'] = 'Name';
			$data['lang']['th_logo'] = 'LOGO';
			$data['lang']['th_action'] = 'Action';
			$data['lang']['btn_delete'] = 'Delete';
			$data['lang']['tf_name'] = 'Name';
			$data['lang']['tf_logo'] = 'LOGO';
			$data['lang']['btn_add'] = 'Add';

		}
	    $data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
	    $this->parser->parse('admin/view_manufacturers', $data);
	}

	public function addManufacturer()
	{	
		if(! $this->input->post('submit')) {
			redirect(base_url() . 'admin/manufacturers');
		}
		else {
		    $manufacturer_name = $this->input->post('manufacturer_name');
		    $manufacturer_logo = $this->upload_image();
		    $this->session->set_flashdata('message','Manufacturer Successfully Created.');
			$this->model_manufacturer->insertManufacturer($manufacturer_name,$manufacturer_logo);
			redirect(base_url() . 'admin/manufacturers');
		}
	}

	public function deleteManufacturer($cid)
	{	
        $this->model_manufacturer->deleteManufacturer($cid);
        $this->session->set_flashdata('message','Manufacturer Successfully Deleted.');
        redirect(base_url('admin/manufacturers'));
	}
	public function upload_image()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'uploads';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('manufacturer_logo'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['manufacturer_logo']['name']);
            $type = $type[count($type) - 1];
            
            $path = '/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }
}