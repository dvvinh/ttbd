<?php
class User_model extends CI_Model{
    public function __construct()
    {
            Parent::__construct();
            $this->load->database();
    }
    public function ds_user($totalPage=0,$start=0){
		//$this->db->select('id');
                if($totalPage!=0)
                    $this->db->limit($totalPage,$start);
		$query=$this->db->get('user');
		return $query->result_array();
	}
    public function tong_user(){
            $query=$this->db->get('user');
            return $query->num_rows();
    }
    
    public function them_user($data)
    {
        $query=$this->db->insert('user',$data);
        if($query)
            return 'true';
        else
            return 'false';
    }
    
    public function xoa_user($id)
    {
        $query=$this->db->where('id',$id);
        $query=$this->db->delete('user');
        return $this->db->affected_rows();
    }
    
    public function xoa_user_nhieu_dong($list_id)
    {
        $this->db->where_in('id',$list_id);
        $query=$this->db->delete('user');
        return $this->db->affected_rows();
        //return $query;
    }
    
    public function sua_user($mangsua)
    {
        $this->db->where('id',$mangsua['id']);
        return $this->db->update('user',$mangsua);
    }
    public  function list_san_bong_api()
    {
        $query=$this->db->get('user');
        $query->result_array();
    }
}