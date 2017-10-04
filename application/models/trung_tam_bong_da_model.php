<?php
class Trung_tam_bong_da_model extends CI_Model{
    public function __construct()
    {
            Parent::__construct();
            $this->load->database();
    }
    public function ds_trung_tam_bong_da($totalPage=0,$start=0){
            //$this->db->select('id');
            if($totalPage!=0)
                $this->db->limit($totalPage,$start);
            $query=$this->db->get('trungtambongda');
            return $query->result_array();
    }
    public function  list_trung_tam_bong_da()
    {
        $query=$this->db->get('trungtambongda');
        return $query->result_array();
    }

    public function tong_trung_tam_bong_da(){
        $query=$this->db->get('trungtambongda');
        return $query->num_rows();
    }
    
    public function them_trung_tam_bong_da($data)
    {
        $query=$this->db->insert('trungtambongda',$data);
        if($query)
            return 'true';
        else
            return 'false';
    }
    
    public function xoa_trung_tam_bong_da($id)
    {
        $query=$this->db->where('id',$id);
        $query=$this->db->delete('trungtambongda');
        return $this->db->affected_rows();
    }
    
    public function xoa_trung_tam_bong_da_nhieu_dong($list_id)
    {
        $this->db->where_in('id',$list_id);
        $query=$this->db->delete('trungtambongda');
        return $this->db->affected_rows();
        //return $query;
    }
    
    public function sua_trung_tam_bong_da($mangsua)
    {
        $this->db->where('id',$mangsua['id']);
        return $this->db->update('trungtambongda',$mangsua);
    }
}