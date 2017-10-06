<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class San_bong extends CI_Controller {

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
    
    public function modal_them_san_bong()
    {
        $this->load->model('San_bong_model');
        $errors=array(
            'error'=>0);
        $ten=isset($_POST['ten']) ? trim($_POST['ten']) : 'ten';
        $so_luong=isset($_POST['so_luong']) ? trim($_POST['so_luong']) : 'so_luong';
        $id_trung_tam=isset($_POST['id_trung_tam']) ? trim($_POST['id_trung_tam']) : 'id_trung_tam';
        $ghi_chu=isset($_POST['ghi_chu']) ? trim($_POST['ghi_chu']) : 'ghichu';
        
        $data=array(
            'ten'=>$ten,
            'so_nguoi_moi_doi'=>$so_luong,
            'id_trung_tam'=>$id_trung_tam,
            'ghi_chu'=>$ghi_chu
        );
        $kq=$this->San_bong_model->them_san_bong($data);
        $TraVe=array();
        $TraVe['vinh']='Vinh';
        $TraVe['kq']=$kq;
        die(json_encode($TraVe));//Trả về cho ajax làm việc
    }
    
    public function test_them(){
        $this->load->model('San_bong_model');
        $data=array(
            'ten'=>'ten',
            'dia_chi'=>'dia_chi',
            'sdt'=>'sdt',
            'ghi_chu'=>'ghi_chu'
        );
        $kq=$this->Trung_tam_bong_da_model->them_trung_tam_bong_da($data);
        return $kq;
    }

    public function ds_san_bong()
    {
        $this->load->model('San_bong_model');
        $perpage=5;
        $tonghang=$this->San_bong_model->tong_san_bong();
        $kq=$this->San_bong_model->ds_san_bong($perpage,$this->uri->segment(3,0));
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
        array_unshift($kq,['ID','Tên sân bóng', 'Số người mỗi đội','ID trung tâm','Ghi chú','Đánh dấu']);
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
        $this->load->model('San_bong_model');
        return $this->San_bong_model->xoa_san_bong_nhieu_dong($list_id);
    }
    public function sua_san_bong()
    {
        $mangsua=$this->input->post('mangsua');
        $this->load->model('San_bong_model');
        $kq = $this->San_bong_model->sua_san_bong($mangsua);
        $mangkq['kq']=$kq;
        die(json_encode($kq));//Trả về cho ajax làm việc
    }
    public function list_san_bong_api()
    {
        $this->load->model('San_bong_model');
        $kq=$this->San_bong_model->list_san_bong_api();
        $mangkq['kq']=$kq;
        die(json_encode($mangkq));
    }    
}
