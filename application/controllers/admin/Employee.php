<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    if ( ! $this->session->userdata('isLogin') || ($this->session->userdata('type') != "admin" )) { 
	        redirect('login');
	    }

		//$this->load->database();
		$this->load->model('model_employee');
                
	}
	public function index()
	{	
		$lang = $this->session->userdata('lang');
        if($lang=="persion"){
            $data['lang']['title'] = 'کارمندان';
            $data['lang']['header_title'] = 'مدیریت کارمندان';
            $data['lang']['th_emp_id'] = 'ایدی کارمند';
            $data['lang']['th_emp_name'] = ' اسم';
            $data['lang']['th_emp_email'] = 'ایمیل ';
            $data['lang']['th_emp_mobile'] = 'موبایل ';
            $data['lang']['th_emp_position'] = 'صلاحیت ';
            $data['lang']['th_emp_gender'] = 'جنسیت';
            $data['lang']['th_emp_img'] = 'عکس';
            $data['lang']['th_emp_access'] = 'دسترسی';
            $data['lang']['th_emp_action'] = 'عملیات';			
        }else{
            $data['lang']['title'] = 'Employee';
            $data['lang']['header_title'] = 'Manage Employee';
            $data['lang']['th_emp_id'] = 'Employee ID';
            $data['lang']['th_emp_name'] = ' Name';
            $data['lang']['th_emp_img'] = 'Image';
            $data['lang']['th_emp_email'] = 'Email';
            $data['lang']['th_emp_mobile'] = 'Mobile ';
            $data['lang']['th_emp_position'] = 'Posistion ';
            $data['lang']['th_emp_gender'] = 'Gender';
            $data['lang']['th_emp_access'] = 'Access';
            $data['lang']['th_emp_action'] = 'Action';			
		}
		
		$data['emp'] = $this->model_employee->getAll();
		

        $this->parser->parse('admin/view_employee', $data);  
    }

	public function add()
	{	

		$lang = $this->session->userdata('lang');
        if($lang=="persion"){
            $data['lang']['title'] = 'کارمندان';
            $data['lang']['header_title'] = 'اضافه کردن کارمند';
            $data['lang']['tf_emp_id'] = 'ایدی کارمند';
            $data['lang']['tf_emp_fname'] = ' اسم';
            $data['lang']['tf_emp_lname'] = ' تخلص';
            $data['lang']['tf_emp_pass'] = ' رمزعبور';
            $data['lang']['tf_emp_email'] = 'ایمیل ';
            $data['lang']['tf_emp_mobile'] = 'موبایل ';
            $data['lang']['tf_emp_position'] = 'صلاحیت ';
            $data['lang']['tf_emp_gender'] = 'جنسیت';
            $data['lang']['tf_emp_image'] = 'عکس';
            $data['lang']['tf_emp_access'] = 'دسترسی';
            $data['lang']['tf_emp_action'] = 'عملیات';			
            $data['lang']['tf_emp_address'] = 'آدرس';			
            $data['lang']['tf_emp_bdate'] = 'تاریخ تولد';			
            $data['lang']['radio_emp_g_male'] = 'مرد';			
            $data['lang']['radio_emp_g_female'] = 'زن';			
            $data['lang']['radio_emp_admin'] = ' آدمین';			
            $data['lang']['radio_emp_employee'] = 'کارمند ';			
            $data['lang']['btn_confirm'] = 'ذخیره';			
        }else{
            $data['lang']['title'] = 'Empoyee';
            $data['lang']['header_title'] = 'Add employee ';
            $data['lang']['tf_emp_fname'] = ' Name';
            $data['lang']['tf_emp_lname'] = ' Last Name';
            $data['lang']['tf_emp_pass'] = ' Password';
            $data['lang']['tf_emp_email'] = 'Email ';
            $data['lang']['tf_emp_image'] = 'Image';
            $data['lang']['tf_emp_mobile'] = 'Mobile ';
            $data['lang']['tf_emp_position'] = 'Position ';
            $data['lang']['tf_emp_gender'] = 'Gender';
            $data['lang']['tf_emp_access'] = 'Access';
            $data['lang']['tf_emp_address'] = 'Address';			
            $data['lang']['tf_emp_bdate'] = 'Date of birth';			
            $data['lang']['radio_emp_g_male'] = 'Male';			
            $data['lang']['radio_emp_g_female'] = 'Female';			
            $data['lang']['radio_emp_admin'] = ' Admin';			
            $data['lang']['radio_emp_employee'] = 'Employee ';			
            $data['lang']['btn_confirm'] = 'Save';			
           		
		}

		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$this->load->view('admin/view_addemployee', $data);
		}
		else
		{
			//$this->load->library('form_validation');
			if($this->form_validation->run('addemp'))
			{
                $u_email = $this->input->post('u_email');
				$f_name = $this->input->post('f_name');
                $l_name = $this->input->post('l_name');
                $u_pass = md5($this->input->post('u_pass'));
                $u_bday = $this->input->post('u_bday');
                $u_position = $this->input->post('u_position');
                $u_type = $this->input->post('u_type');
                $u_mobile = $this->input->post('u_mobile');
                $u_gender = $this->input->post('u_gender');
                $u_address = $this->input->post('u_address');
                $image = $this->upload_image();
				$this->model_employee->insert($u_email,$f_name,$l_name,$u_bday,$u_position,$u_type,$u_pass,$u_mobile,$u_gender,$u_address,$image);
				$this->session->set_flashdata('message','Employee Successfully Created.');
				redirect(base_url('admin/employee'));
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('admin/view_addemployee', $data);
			}
		}
	}

	public function edit($cid)
	{	
        $lang = $this->session->userdata('lang');

        if($lang=="persion"){
            $data['lang']['title'] = 'کارمندان';
            $data['lang']['header_title'] = 'اضافه کردن کارمند';
            $data['lang']['tf_emp_id'] = 'ایدی کارمند';
            $data['lang']['tf_emp_fname'] = ' اسم';
            $data['lang']['tf_emp_lname'] = ' تخلص';
            $data['lang']['tf_emp_pass'] = ' رمزعبور';
            $data['lang']['tf_emp_email'] = 'ایمیل ';
            $data['lang']['tf_emp_mobile'] = 'موبایل ';
            $data['lang']['tf_emp_position'] = 'صلاحیت ';
            $data['lang']['tf_emp_image'] = 'عکس ';
            $data['lang']['tf_emp_gender'] = 'جنسیت';
            $data['lang']['tf_emp_access'] = 'دسترسی';
            $data['lang']['tf_emp_action'] = 'عملیات';			
            $data['lang']['tf_emp_address'] = 'آدرس';			
            $data['lang']['tf_emp_bdate'] = 'تاریخ تولد';			
            $data['lang']['radio_emp_g_male'] = 'مرد';			
            $data['lang']['radio_emp_g_female'] = 'زن';			
            $data['lang']['radio_emp_admin'] = ' آدمین';			
            $data['lang']['radio_emp_employee'] = 'کارمند ';			
            $data['lang']['btn_confirm'] = 'ذخیره';			
        }else{
            $data['lang']['title'] = 'Empoyee';
            $data['lang']['header_title'] = 'Add employee ';
            $data['lang']['tf_emp_fname'] = ' Name';
            $data['lang']['tf_emp_lname'] = ' Last Name';
            $data['lang']['tf_emp_pass'] = ' Password';
            $data['lang']['tf_emp_email'] = 'Email ';
            $data['lang']['tf_emp_image'] = 'Image ';
            $data['lang']['tf_emp_mobile'] = 'Mobile ';
            $data['lang']['tf_emp_position'] = 'Position ';
            $data['lang']['tf_emp_gender'] = 'Gender';
            $data['lang']['tf_emp_access'] = 'Access';
            $data['lang']['tf_emp_address'] = 'Address';			
            $data['lang']['tf_emp_bdate'] = 'Date of birth';			
            $data['lang']['radio_emp_g_male'] = 'Male';			
            $data['lang']['radio_emp_g_female'] = 'Female';			
            $data['lang']['radio_emp_admin'] = ' Admin';			
            $data['lang']['radio_emp_employee'] = 'Employee ';			
            $data['lang']['btn_confirm'] = 'Save';			
           		
		}

		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$userRow = $this->model_employee->get($cid);
			$data['userRow'] = $userRow;
			$this->load->view('admin/view_editemployee', $data);
		}
		else
		{
			if($this->form_validation->run('editemp'))
			{
				$f_name = $this->input->post('f_name');
                $l_name = $this->input->post('l_name');
                $u_bday = $this->input->post('u_bday');
                $u_position = $this->input->post('u_position');
                $u_type = $this->input->post('u_type');
                $u_pass = md5($this->input->post('u_pass'));
                $u_mobile = $this->input->post('u_mobile');
                $u_gender = $this->input->post('u_gender');
                $u_address = $this->input->post('u_address');
                $u_id = $this->input->post('u_id');
                $image = $this->upload_image();
				$this->model_employee->update($f_name,$l_name,$u_bday,$u_position,$u_type,$u_pass,$u_mobile,$u_gender,$u_address,$u_id,$image);
				redirect(base_url('admin/employee'));
			}
			else
			{
				$data['message'] = validation_errors();  //data ta message name er lebel er kase pathay
				$this->load->view('view_employee', $data);
			}
		}
	}

	public function delete($cid)
	{	
        $this->model_employee->delete($cid);
        $this->session->set_flashdata('message','Employee Successfully deleted.');
        redirect(base_url('admin/employee'));
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
        if ( ! $this->upload->do_upload('profile'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['profile']['name']);
            $type = $type[count($type) - 1];
            
            $path = '/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }
}

