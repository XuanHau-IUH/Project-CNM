<?php
include_once("Model/Connect.php");
class mTracNghiem
{

    public function select_tracnghiem($idUnit)
    {
        $conn;
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM cauhoi WHERE  idUnit = '$idUnit'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            return $table;
        } else {
            return false;
        }
    }

    //Lưu kết quả vào db
    function luu_ketqua($idKetQua, $noiDungKetQua, $idTaiKhoan, $idcauHoi, $diemSo)
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $string = "INSERT INTO ketqua (idKetQua, noiDungKetQua, idTaiKhoan,idcauHoi, diemSo)  VALUES ";

        foreach ($noiDungKetQua as $index => $item) {

            $idKetQua = $item['idKetQua'];
            $noiDungKetQua = $item['noiDungKetQua'][$index];
            $idTaiKhoan = $item['idTaiKhoan'];
            $idcauHoi = $item['idcauHoi'];
            $diemSo = $item['diemSo'];
            $string .= "($idKetQua, $noiDungKetQua, $idTaiKhoan, $idcauHoi, $diemSo), ";
        }
        $insert = rtrim($string, ", ");
        $kq = mysqli_query($conn,  $insert);
        $p->dongketnoi($conn);
        return $kq;
    }

    public function getTestUnits()
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $string = "SELECT * FROM unit";
        $result = mysqli_query($conn, $string);
        $p->dongketnoi($conn);
        return $result;
    }
}
