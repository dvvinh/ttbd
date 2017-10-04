<?php
class San_bong_model extends CI_Model{
    public function __construct()
    {
            Parent::__construct();
            $this->load->database();
    }
    public function ds_san_bong($totalPage=0,$start=0){
		//$this->db->select('id');
                if($totalPage!=0)
                    $this->db->limit($totalPage,$start);
		$query=$this->db->get('sanbong');
		return $query->result_array();
	}
    public function tong_san_bong(){
            $query=$this->db->get('sanbong');
            return $query->num_rows();
    }
    
    public function them_san_bong($data)
    {
        $query=$this->db->insert('sanbong',$data);
        if($query)
            return 'true';
        else
            return 'false';
    }
    
    public function xoa_san_bong($id)
    {
        $query=$this->db->where('id',$id);
        $query=$this->db->delete('sanbong');
        return $this->db->affected_rows();
    }
    
    public function xoa_san_bong_nhieu_dong($list_id)
    {
        $this->db->where_in('id',$list_id);
        $query=$this->db->delete('sanbong');
        return $this->db->affected_rows();
        //return $query;
    }
    
    public function sua_san_bong($mangsua)
    {
        $this->db->where('id',$mangsua['id']);
        return $this->db->update('sanbong',$mangsua);
    }
    public  function list_san_bong_api()
    {
        $query=$this->db->get('sanbong');
        $query->result_array();
    }
}