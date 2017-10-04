<?php
class Modal extends CI_Controller{
    
    public function index(){
        $data['x']='';
        $this->load->view('v_modal',$data,FALSE);
    }
}