<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin')) { 
            redirect('login');
        }
        $this->load->library('pagination');
		
		$this->load->model('model_vehicle');
        $this->load->model('model_manufacturer');
        $this->load->model('model_car_model');
	}

	public function index()
	{


        $lang = $this->session->userdata('lang');
        if($lang=="persion"){
			$data['lang']['title'] = 'موتر ها';
			$data['lang']['title_header'] = 'همه موتر ها';
			$data['lang']['btn_add'] = 'اضافه کردن موتر';
			$data['lang']['th_id'] = 'ایدی';
			$data['lang']['th_model'] = 'مودل';
			$data['lang']['th_make'] = 'سازنده';
			$data['lang']['th_category'] = 'کتگوری';
			$data['lang']['th_date'] = 'تاریض اضافه شده';
			$data['lang']['th_status'] = 'حالت';
			$data['lang']['th_bought'] = 'قیمت';
			$data['lang']['th_image'] = 'عکس';
			$data['lang']['th_action'] = 'عملیات';
            $data['lang']['th_sold_on'] = 'فروخته شده';
            
            $data['lang']['tf_mf'] = 'سازنده';
            $data['lang']['tf_category'] = 'کتگوری';
            $data['lang']['tf_gear_type'] = 'نوع دنده';
            $data['lang']['tf_eg_number'] = 'شماره انجن';
            $data['lang']['tf_add_date'] = 'تاریخ اضافه شده';
            $data['lang']['tf_registration_year'] = 'سال راجستر';
            $data['lang']['tf_no_set'] = 'تعدات ست';
            $data['lang']['tf_color'] = 'رنگ';
            $data['lang']['tf_featured'] = 'فیچرید؟';
            $data['lang']['tf_v_model'] = 'مدل موتر';
            $data['lang']['tf_price'] = 'قیمت';
            $data['lang']['tf_mileage'] = 'پیمایش(km)';
            $data['lang']['tf_chassis_num'] = 'نمبر شاسی';
            $data['lang']['tf_no_door'] = 'تعداد دروازه';
            $data['lang']['tf_insurance_id'] = 'شماره بیمه';
            $data['lang']['tf_tank_capacity'] = 'ظرفیت تانک(لیتر)';
            
			
		}else{
			$data['lang']['title'] = 'Vehicles';
			$data['lang']['title_header'] = 'All Vehicles';
			$data['lang']['btn_add'] = 'Add vehicles';
			$data['lang']['th_id'] = 'ID';
			$data['lang']['th_model'] = 'Mode';
			$data['lang']['th_make'] = 'Make';
			$data['lang']['th_category'] = 'Category';
			$data['lang']['th_date'] = ' Added Date';
			$data['lang']['th_status'] = 'Status';
			$data['lang']['th_bought'] = 'Bought';
			$data['lang']['th_image'] = 'Image';
			$data['lang']['th_action'] = 'Action';
            $data['lang']['th_sold_on'] = 'Sold on';
            
            $data['lang']['tf_mf'] = 'Vehicle Manufacturer';
            $data['lang']['tf_category'] = 'Vehicle Category';
            $data['lang']['tf_gear_type'] = 'Gear Type:';
            $data['lang']['tf_eg_number'] = 'Engine Number';
            $data['lang']['tf_add_date'] = 'Add date';
            $data['lang']['tf_registration_year'] = 'Registration Year';
            $data['lang']['tf_no_set'] = 'No Of Seat';
            $data['lang']['tf_color'] = 'Color';
            $data['lang']['tf_featured'] = 'Featured?';
            $data['lang']['tf_v_model'] = 'Vehicle Model';
            $data['lang']['tf_price'] = 'Price';
            $data['lang']['tf_mileage'] = 'Mileage(km)';
            $data['lang']['tf_chassis_num'] = 'Chssis Number';
            $data['lang']['tf_no_door'] = 'No Door';
            $data['lang']['tf_insurance_id'] = 'Insurance ID';
            $data['lang']['tf_tank_capacity'] = 'Tank Capacity(litter)';
			
        }
        
        $data['udata']=$this->session->userdata;
        // $data['vehicles'] = $this->model_vehicle->getAll();
        $data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
        $data['models'] = $this->model_car_model->getAllModels();
        

        // ----------------------Paginations
        $config = array();
        $config["base_url"] = base_url("admin/vehicles/index");
        $config['first_url']= base_url() . "admin/vehicles/index/1";
        $config["total_rows"] = $this->model_vehicle->record_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // echo $page;
        // die;

        // echo $last_seg_no;
        $data["vehicles"] = $this->model_vehicle->getPagination($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        // ----------------------

        //$this->load->view('view_vehicle', $data); 
        $this->parser->parse('admin/view_vehicle', $data);   
    }


	public function sell()
	{
        $lang = $this->session->userdata('lang');
        if($lang=="persion"){
            $cdata['lang']['title'] = 'مشتری';
            $cdata['lang']['title_header'] = 'اضافه کردن مشخصات مشتری';
           
            $cdata['lang']['tf_name'] = 'اسم مشتری';
            $cdata['lang']['tf_lname'] = 'تخلص';
            $cdata['lang']['tf_email'] = 'ایمیل آدرس';
            $cdata['lang']['tf_sell_price'] = 'قیمت فروش';
            $cdata['lang']['tf_mobile'] = 'شماره تماس';
            $cdata['lang']['tf_warranty_str'] = 'شروع تاریخ گارانتی';
            $cdata['lang']['tf_warranty_end'] = 'ختم تاریخ گارانتی';
            $cdata['lang']['tf_payment'] = 'متود پرداخت';
            $cdata['lang']['btn_confirm'] = 'تایید و فروش';
            
        }else{
            $cdata['lang']['title'] = 'Custommer ';
            $cdata['lang']['title_header'] = 'Add Custommer';
            $cdata['lang']['tf_name'] = 'First Name';
            $cdata['lang']['tf_lname'] = 'Last Name';
            $cdata['lang']['tf_email'] = 'Email';
            $cdata['lang']['tf_sell_price'] = 'Sell Price';
            $cdata['lang']['tf_mobile'] = 'Phone';
            $cdata['lang']['tf_warranty_str'] = 'Warranty Start Date';
            $cdata['lang']['tf_warranty_end'] = 'Warranty End Date:';
            $cdata['lang']['tf_payment'] = 'Payment Method';
            $cdata['lang']['btn_confirm'] = 'Confirm Sell';
            
        }
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
            $cid = $this->input->post('vehicle_id');
            $cdata['cid'] = $cid;
            if(!$this->input->post('buttonSubmits'))
    		{
    			$data['message'] = '';
                //$data['vRow'] = $this->model_vehicle->get($cid);
                $this->load->view('admin/view_sell', $cdata);
    		}
            else{
                $this->form_validation->set_rules('cf_name', 'First Name', 'required');
                $this->form_validation->set_rules('cl_name', 'Last Name', 'required');
                $this->form_validation->set_rules('c_email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('c_mobile', 'Mobile', 'required|trim');
                $this->form_validation->set_rules('s_price', 'Selling Price', 'required|numeric|greater_than[1]');
                $this->form_validation->set_rules('w_end', 'Warranty End date', 'required');
				$this->form_validation->set_rules('v_id', 'Vehicle Id', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('admin/view_sell', $data);
                }
                else {
                    $v_id = $this->input->post('v_id');
                    $cf_name = $this->input->post('cf_name');
                    $cl_name = $this->input->post('cl_name');
                    $c_email = $this->input->post('c_email');
                    $s_price = $this->input->post('s_price');
                    $c_mobile = $this->input->post('c_mobile');
                    $w_start = $this->input->post('w_start');
                    $w_end = $this->input->post('w_end');
                    $payment_type = $this->input->post('payment_type');
                    $c_pass = "1234";

                    $this->model_vehicle->sell($v_id,$cf_name,$cl_name,$c_email,$s_price,$c_mobile,$w_start,$w_end,$payment_type,$c_pass);
                    redirect(base_url('admin/vehicles'));
                }
            }
        }
        else {
            redirect(base_url('admin/vehicles'));
        }
	}

	public function add()
	{	
		if($this->input->post('buttonSubmit')) {
			$data['message'] = '';
		
				$this->form_validation->set_rules('manufacturer_id', 'Manufacturer', 'required');
				$this->form_validation->set_rules('model_id', 'Model', 'required');
				$this->form_validation->set_rules('category', 'Category ', 'required');
				$this->form_validation->set_rules('b_price', 'Buying Price ', 'required');
				$this->form_validation->set_rules('mileage', 'Mileage', 'required');
				$this->form_validation->set_rules('add_date', 'Adding Date', 'required');
				$this->form_validation->set_rules('registration_year', 'Registration Year Date', 'required');
				$this->form_validation->set_rules('insurance_id', 'Insurance ID', 'required');
				$this->form_validation->set_rules('gear', 'Gear', 'required');
				$this->form_validation->set_rules('doors', 'Number of Doors', 'required');
				$this->form_validation->set_rules('seats', 'Number of Seats', 'required');
				$this->form_validation->set_rules('tank', 'Tank capacity', 'required');
				$this->form_validation->set_rules('e_no', 'Engine No', 'required');
				$this->form_validation->set_rules('c_no', 'Chasis No', 'required');
				$this->form_validation->set_rules('v_color', 'Color', 'required');		
				
				if($this->form_validation->run() == FALSE)
				{
					//$data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('admin/view_vehicle');
				}
				else{
					
            
            $manufacturer_name = $this->input->post('manufacturer_id');
		    $model_name = $this->input->post('model_id');
            $category = $this->input->post('category');
            $b_price = $this->input->post('b_price');
        
            $mileage = $this->input->post('mileage');
            $add_date = $this->input->post('add_date');
            $status = "available";
            $registration_year = $this->input->post('registration_year');
            $insurance_id = $this->input->post('insurance_id');
            $gear = $this->input->post('gear');
            $doors = $this->input->post('doors');
            $seats = $this->input->post('seats');
            $tank = $this->input->post('tank');
            $e_no = $this->input->post('e_no');
            $c_no = $this->input->post('c_no');
            $u_id = $this->session->userdata('id');
            $v_color = $this->input->post('v_color');
            $featured = $this->input->post('featured');
            
           
            $image= $this->upload_image(); 
			
            $this->model_vehicle->insert($featured,$image,$manufacturer_name,$model_name,$category,$b_price,$mileage,$add_date,$status,$registration_year,$insurance_id,$gear,$doors,$seats,$tank,$e_no,$c_no,$u_id,$v_color);
			$this->session->set_flashdata('message','Vehicle Successfully Created.');
			redirect(base_url('admin/vehicles'));
		
			}
		}
		else{
		redirect(base_url('admin/vehicles'));
		}
	}



	public function DeleteVehicle()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
             
            $id = $this->input->post('vehicle_id');
            $this->model_vehicle->delete($id);
			$this->session->set_flashdata('message','Vehicle Successfully Deleted.');
            redirect(base_url('admin/vehicles'));
        }
        else {
            redirect(base_url('admin/vehicles'));
	    }
    }
        
    public function DeleteCustomer()
	{	
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
            $v_id= $this->input->post('v_id');
            $c_id= $this->input->post('c_id');
               
            $this->model_vehicle->deletecustomer($c_id,$v_id);
			$this->session->set_flashdata('message','Customer Successfully Created.');
            redirect(base_url('admin/vehicles/soldlist'));
        }
        else{
            redirect(base_url('admin/vehicles/soldlist'));
        }
	}

    public function soldList()
    {   
        $lang = $this->session->userdata('lang');
        if($lang=="persion"){
            $data['lang']['title'] = 'موترهای فروخته شده';
            $data['lang']['title_header'] = 'همه  مشتریان';
            $data['lang']['th_id'] = 'آیدی';
            $data['lang']['th_contact'] = 'تماس';
            $data['lang']['th_make'] = 'ساخت';
            $data['lang']['th_model'] = 'مودل';
            $data['lang']['th_price'] = 'قیمت و مفاد';
            $data['lang']['th_date'] = 'تاریخ فروش';
            $data['lang']['th_warranty'] = 'ورانتی';
            $data['lang']['th_insurance'] = 'بیمه';
            $data['lang']['th_engine'] = 'انجن';
            
        }else{
            $data['lang']['title'] = 'Sold Vehicles';
            $data['lang']['title_header'] = 'All Custommer';
            $data['lang']['th_id'] = 'ID';
            $data['lang']['th_contact'] = 'Contact';
            $data['lang']['th_make'] = 'Make';
            $data['lang']['th_model'] = 'Model';
            $data['lang']['th_price'] = 'Price & Profit';
            $data['lang']['th_date'] = 'Date ';
            $data['lang']['th_warranty'] = 'Warranty';
            $data['lang']['th_insurance'] = 'Insurance';
            $data['lang']['th_engine'] = 'Engine#';

        }
        $data['cus'] = $this->model_vehicle->customerList();
        $this->load->view('admin/view_sold', $data);     
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
        if ( ! $this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['image']['name']);
            $type = $type[count($type) - 1];
            
            $path = '/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }
}

