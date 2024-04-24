<?php
include_once("Model/Connect.php");
class modelLogin
{
    public function SelectAllUser()
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $users = "SELECT * FROM phuhuynh ";
        $table = mysqli_query($conn,  $users);
        $list_users = array();
        if (mysqli_num_rows($table) > 0) {
            while ($row = mysqli_fetch_assoc($table)) {
                $list_users[] = $row;
            }
            return $list_users;
        }
        $p->dongketnoi($conn);
    }
    public function SelectAllUser1()
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $users = "SELECT * FROM chuyenvien ";
        $table = mysqli_query($conn,  $users);
        $list_users = array();
        if (mysqli_num_rows($table) > 0) {
            while ($row = mysqli_fetch_assoc($table)) {
                $list_users[] = $row;
            }
            return $list_users;
        }
        $p->dongketnoi($conn);
    }
    public function SelectAllUser2()
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $users = "SELECT * FROM quantrivien ";
        $table = mysqli_query($conn,  $users);
        $list_users = array();
        if (mysqli_num_rows($table) > 0) {
            while ($row = mysqli_fetch_assoc($table)) {
                $list_users[] = $row;
            }
            return $list_users;
        }
        $p->dongketnoi($conn);
    }
    function Register($tenDangNhap,$matKhau, $email,$hoTen, $soDienThoai, $trangthai, $ngayTao )
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $insert = " INSERT INTO phuhuynh(tenDangNhap,matKhau, email ,hoTen, soDienThoai, trangthai, ngayTao) 
        VALUES ('$tenDangNhap' ,'$matKhau', '$email', '$hoTen', '$soDienThoai', '$trangthai', '$ngayTao')";
        $kq = mysqli_query($conn, $insert);
        $p->dongketnoi($conn);
        return $kq;
    }
}