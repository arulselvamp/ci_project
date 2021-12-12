<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Customers extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Customers_Model','person');
    }
 
    public function index()
    {
        $this->load->helper('url');
        if($this->session->userdata('admin_user')){
            $this->load->view('admin/customer_input_view');
        }else{
            redirect('/');
        }        
    }

    function customer_input()
    {
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $email = $this->input->post('email');
            $mob = $this->input->post('mob');
            $address = $this->input->post('address');
            $data = array(  
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,                
                'mob' => $mob,
                'address' => $address,
            );
            $query = $this->db->insert('customers',$data);
            if($query){
                    echo "<script>alert('Saved successfully !')</script>";
                    redirect('admin/Customers', 'refresh');
                }
                else{
                   echo "<script>alert('Error in Saving..')</script>";
                   redirect('admin/Customers', 'refresh');
                }

        }
    public function view()
    {
        $this->load->view('admin/customers_view');       
    }

    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->customer_id;
            $row[] = $person->fname.".".$person->lname;
            $row[] = $person->email;
            $row[] = $person->mob;
            $row[] = $person->address;

            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Display" onclick="display_person('."'".$person->customer_id."'".')"><i class="fas fa-eye" ></i></a>&nbsp;<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->customer_id."'".')"><i class="fas fa-edit" ></i></a>&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->customer_id."'".')"><i class="fas fa-times" ></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->person->count_all(),
                        "recordsFiltered" => $this->person->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_display($id)
    {
        $data = $this->person->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                       
            'dept_code' => $this->input->post('dept_code'),
            'dept_name' => $this->input->post('dept_name'), 
            'programme' => $this->input->post('programme'),
            'college_type' => $this->input->post('college_type'),
           
            );        
        
        $insert = $this->person->save($data);
        if($insert)
        echo json_encode(array("status" => TRUE));
        else{
            $data['inputerror'][] = 'dept_code';
            $data['error_string'][] = 'Department code must be unique';
            echo json_encode($data);
            exit(); 
        }

    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'), 
            'email' => $this->input->post('email'),
            'mob' => $this->input->post('mob'),
            'address' => $this->input->post('address'),

            );        
        $this->person->update(array('customer_id' => $this->input->post('customer_id')), $data);
        echo json_encode(array("status" => TRUE));
       
    }
 
    public function ajax_delete($id)
    {
        $id = $this->input->post('id');
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;        
                
        if($this->input->post('fname') == '')
        {
            $data['inputerror'][] = 'fname';
            $data['error_string'][] = 'First Name is required';
            $data['status'] = FALSE;
        } 
        if($this->input->post('lname') == '')
        {
            $data['inputerror'][] = 'lname';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email ID is required';
            $data['status'] = FALSE;
        }      
        if($this->input->post('mob') == '')
        {
            $data['inputerror'][] = 'mob';
            $data['error_string'][] = 'Phone Number is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}