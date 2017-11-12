<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function phantrang($total_row, $base_url, $perpage)
    {
        $config['base_url']=$base_url;
        $config['total_rows']=$total_row;
        $config['per_page']=$perpage;
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    
    public function modal_them_user()
    {
        $this->load->model('User_model');
        $errors=array(
            'error'=>0);
        $ten=isset($_POST['ten']) ? trim($_POST['ten']) : 'ten';
        $so_luong=isset($_POST['so_luong']) ? trim($_POST['so_luong']) : 'so_luong';
        $id_trung_tam=isset($_POST['id_trung_tam']) ? trim($_POST['id_trung_tam']) : 'id_trung_tam';
        $ghi_chu=isset($_POST['ghi_chu']) ? trim($_POST['ghi_chu']) : 'ghi_chu';
        
        $data=array(
            'ten'=>$ten,
            'so_nguoi_moi_doi'=>$so_luong,
            'id_trung_tam'=>$id_trung_tam,
            'ghi_chu'=>$ghi_chu
        );
        $kq=$this->User_model->them_user($data);
        $TraVe=array();
        $TraVe['vinh']='Vinh';
        $TraVe['kq']=$kq;
        die(json_encode($TraVe));//Trả về cho ajax làm việc
    }
    
    public function ds_user()
    {
        $this->load->model('User_model');
        $perpage=5;
        $tonghang=$this->User_model->tong_user();
        $kq=$this->User_model->ds_user($perpage,$this->uri->segment(3,0));
        $kq[0]['ckb']="Vinh";
        for($i=0;$i<count($kq);$i++)
        {
            $giatriCheckBox=array(
                'name'=>'chk_TenChon_all[]',
                'id'=>'chk_'.'all_'.$kq[$i]['id'],
                'checked'=>False,
                //'style'=>'margin:10px',
                'value'=>$kq[$i]['id']
            );
            $kq[$i]['ckb']=form_checkbox($giatriCheckBox);
        }
        array_unshift($kq,['ID','Username', 'Password','Email','Phân quyền','Đánh dấu']);
        $data['recs']=$this->table->generate($kq);
        $data['recs']=str_replace('<table border="0" cellpadding="4" cellspacing="0">', '<table class="table table-striped table-hover">',$data['recs']);
        //Thêm dòng chọn tất cả
        $data['recs']=str_replace('</tbody>',"<tr><th colspan='5' class = 'center bold'>Chọn tất cả</th><th  class = 'center' ><input type='checkbox' name='chk_TenChon_check_all' id=\"chk_TenChon_check_all\" onclick='processCheckAll(\"TenChon\")' /> <label for='chk_TenChon_check_all'></label></th></tr></tbody>",$data['recs']);
        //Thêm dòng chọn
        $lk=$this->phantrang($tonghang,site_url('trung_tam_bong_da/ds_trung_tam_bong_da'),$perpage);
        $lk='<ul class="pagination">'.$lk;
        $lk=str_replace('<a hr','<li><a hr',$lk);
        $lk=str_replace('</a>','</a></li>'."\n",$lk);
        $lk=str_replace('<strong>','<li class="active"><a><strong>',$lk);
        $lk=str_replace('</strong>','</strong></a></li>'."\n",$lk);
        $lk.='</ul>';

        $data['links']=$lk;
        $this->load->view('phantrang_sanbong',$data);
    }
    public function xoa_nhieu_dong()
    {
        $list_id=$this->input->post('id');
        $this->load->model('User_model');
        return $this->User_model->xoa_user_nhieu_dong($list_id);
    }
    public function sua_user()
    {
        $mangsua=$this->input->post('mangsua');
        $this->load->model('User_model');
        $kq = $this->User_model->sua_user($mangsua);
        $mangkq['kq']=$kq;
        die(json_encode($kq));//Trả về cho ajax làm việc
    }
    public function list_user_api()
    {
        $this->load->model('User_model');
        $kq=$this->User_model->list_user_api();
        $mangkq['kq']=$kq;
        die(json_encode($mangkq));
    }    
}
