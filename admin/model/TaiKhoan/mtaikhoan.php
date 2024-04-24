<?php
    include_once("model/connect.php");
    class mtaikhoan{
        #hiển thị thông tin tài khoản
        public function select_taikhoan(){
            $conn;
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                $string="SELECT * FROM taikhoan1";
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false;
            }
        }
        #THÊM TÀI KHOẢN
        public function addtaikhoan($username,$password,$Role){
            $conn;
            $p=new ketnoi();
            if ($p->moketnoi($conn)){
                $password =md5($password); 
                $string="Insert into taikhoan1(username,password,Role) values";
                $string .="('".$username."','".$password."','".$Role."')";
                // echo $string;
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false;
            }
        }
        #XEM TÀI KHOẢN THEO USERNAME
        public function select_taikhoan_username($username,$Role){
            $conn;
            $p=new ketnoi;
            if ($p->moketnoi($conn)){
                // $string="SELECT *FROM taikhoan WHERE username='".$username."'";
                $string="SELECT * FROM taikhoan1 JOIN role on taikhoan1.Role = role.idRole WHERE taikhoan1.username='".$username."' && role.idRole=".$Role."";
                // echo $string;
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        #XEM TÀI KHOẢN USERNAME THEO KHACH1 HANG
        public function select_taikhoan_usernamedoanhnghiep(){
            $conn;
            $p=new ketnoi;
            if ($p->moketnoi($conn)){
                // $string="SELECT *FROM taikhoan WHERE username='".$username."'";
                $string="SELECT * FROM taikhoan1 JOIN phuhuynh on taikhoan1.username = phuhuynh.username WHERE taikhoan1.Role=2";
                // echo $string;
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        #UPDATE TÀI KHOẢN
        // public function updatetaikhoan($username,$password){
        //     $conn;
        //     $p=new ketnoi();
        //     if($p->moketnoi($conn)){
        //         $password=md5($password);
        //         $string="update taikhoan";
        //         $string .=" set username='".$username."', password='".$password."'";
        //         $string .= "where username='".$username."'";
        //         // echo $string;
        //         $table = mysqli_query($conn, $string);
        //         $p->dongketnoi($conn);
        //         return $table;
        //     }else {
        //         return false;
        //     }
        // }
        public function updatetaikhoan($username,$usernamecu,$password){
            $conn;
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                // $password=md5('$password');
                $string="update taikhoan1";
                $string .=" set username='".$username."',password=md5('".$password."')";
                $string .= "where username='".$usernamecu."'";
                // echo $string;
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        // 
        //
        #UPDATE MẬT KHẨU CHO TÀI KHOẢN TRÊN BẢNG TÀI KHOẢN
        public function update_matkhau($username,$password){
            $conn;
            $p=new ketnoi();
            if ($p->moketnoi($conn)){
                $string="update taikhoan1";
                $string .="  set password=md5('".$password."')";
                $string .= "where username='".$username."'";
                // echo $string;
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        







        // KIỂM TRA TRÙNG TÀI KHOẢN KHI ĐĂNG NHẬP
        // 
        // 
        #kiểm tra trùng tài khoản
        public function check_taikhoan($username){
            $conn;
            $p= new ketnoi();
            if($p->moketnoi($conn)){
                $string = "SELECT * FROM taikhoan1 WHERE username = '$username'";
                // echo $string;
                $table= mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                // var_dump($table);
                return $table;
            }else {
                return false;
            }
        }
        public function check_user_khachhang($username){
            $conn;
            $p= new ketnoi();
            if($p->moketnoi($conn)){
                $string = "SELECT * FROM phuhuynh WHERE idTaiKhoan = '$username'";
                // echo $string;
                $table= mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                // var_dump($table);
                return $table;
            }else {
                return false;
            }
        }
        // 
        // 
        // 
        // 
        #DELETE TAI KHOAN
        public function deletetaikhoan($username){
            $conn;
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                $string = "DELETE FROM taikhoan1 WHERE username ='".$username."'";
                // echo $string;
                $table=mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }

        //LOGIN
        //hàm đăng nhập
        public function login($username, $password){
            $conn;
            $p = new ketnoi();
            if($p -> moketnoi($conn)){
                $sql = "SELECT * FROM taikhoan1 WHERE username = '".$username."' and password = '".$password."'";
                $sql .= " and Role = 1";
                // echo $sql;
                $result = mysqli_query($conn,$sql);
                $p -> dongketnoi($conn);
                return $result;
            }else{
                return false;
            }
        }
        //hàm lấy thông tin người dùng đã đăng nhập vào tài khoản
        public function select_tt_taikhoan($username){
            $conn;
            $p = new ketnoi();
            if($p -> moketnoi($conn)){
                $sql = "SELECT * FROM taikhoan1 JOIN admin ON taikhoan1.username = admin.username WHERE taikhoan1.username = '".$username."'";

                $result = mysqli_query($conn,$sql);
                $p -> dongketnoi($conn);
                return $result;
            }else{
                return false;
            }
        }
    }

?>