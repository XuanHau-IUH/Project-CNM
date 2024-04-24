<?php
include_once("Model/mTracNghiem.php");
class cTracNghiem
{
    public function select_tracnghiem($idUnit)
    {
        $p = new mTracNghiem();
        $table = $p->select_tracnghiem($idUnit);
        return $table;
    }

    public function getTestUnits()
    {
        $model = new mTracNghiem();
        return $model->getTestUnits();
    }

    //Lưu kết quả vào db
    public function get_saveResult( $idKetQua, $noiDungKetQua, $idTaiKhoan, $idcauHoi, $diemSo)
    {
        $p = new mTracNghiem();
        $table = $p->luu_ketqua($idKetQua, $noiDungKetQua, $idTaiKhoan, $idcauHoi, $diemSo);
        return $table;
        
    }

}

