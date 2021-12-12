<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Vehicles extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Vehicles_Model','person');
    }
 
    public function index()
    {
        $this->load->helper('url');
        if($this->session->userdata('admin_user')){
            $this->load->view('admin/vehicle_input_view');
        }else{
            redirect('/');
        }        
    }

    function vehicle_input()
    {
            $customer_id = $this->input->post('customer_id');
            $result=explode('-', $customer_id,3);            
            $vname = $this->input->post('vname');
            $vmodel = $this->input->post('vmodel');
            $vvin = $this->input->post('vvin');
            $data = array(  
                'customer_id' => $result[0],
                'cname' => $result[1].".".$result[2],
                'vname' => $vname,
                'vmodel' => $vmodel,
                'vvin' => $vvin, 
            );
            $query = $this->db->insert('vehicles',$data);
            if($query){
                    echo "<script>alert('Saved successfully !')</script>";
                    redirect('admin/Vehicles', 'refresh');
                }
                else{
                   echo "<script>alert('Error in Saving..')</script>";
                   redirect('admin/Vehicles', 'refresh');
                }

        }
    public function view()
    {
        $this->load->view('admin/vehicles_view');       
    }

    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->vehicle_id;
            $row[] = $person->cname;
            $row[] = $person->vname;
            $row[] = $person->vmodel;
            $row[] = $person->vvin;

            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Display" onclick="display_person('."'".$person->vehicle_id."'".')"><i class="fas fa-eye" ></i></a>&nbsp;<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->vehicle_id."'".')"><i class="fas fa-edit" ></i></a>&nbsp;<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->vehicle_id."'".')"><i class="fas fa-times" ></i></a>';
         
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
                       
            'customer_id' => $result[0],
            'cname' => $result[1],
            'vname' => $this->input->post('vname'), 
            'vmodel' => $this->input->post('vmodel'),
            'vvin' => $this->input->post('vvin'),
           
            );        
        
        $insert = $this->person->save($data);
        if($insert)
        echo json_encode(array("status" => TRUE));
        else{
            echo json_encode($data);
            exit(); 
        }

    }
 
    public function ajax_update()
    {
        $this->_validate();
        $customer_id= $this->input->post('customer_id');
        $result=explode('-',$customer_id,2);
        $data = array(
            'customer_id' => $result[0],
            'cname' => $result[1],
            'vname' => $this->input->post('vname'), 
            'vmodel' => $this->input->post('vmodel'),
            'vvin' => $this->input->post('vvin'),
            );        
        $this->person->update(array('vehicle_id' => $this->input->post('vehicle_id')), $data);
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
                
        if($this->input->post('customer_id') == '')
        {
            $data['inputerror'][] = 'customer_id';
            $data['error_string'][] = 'Customer is required';
            $data['status'] = FALSE;
        } 
        if($this->input->post('vname') == '')
        {
            $data['inputerror'][] = 'vname';
            $data['error_string'][] = 'Vehicle name is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('vmodel') == '')
        {
            $data['inputerror'][] = 'vmodel';
            $data['error_string'][] = 'Vehicle Model is required';
            $data['status'] = FALSE;
        }      
        if($this->input->post('vvin') == '')
        {
            $data['inputerror'][] = 'vvin';
            $data['error_string'][] = 'Vehicle VIN is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}