<?php

include_once("Model/Account/Account.php");
class controlLogin{

    function getAllLogin($username, $password)
    {

        $p = new modelLogin();
        $tblLogin = $p->SelectAllUser();
        $tblLogin1 = $p->SelectAllUser1();
        $tblLogin2= $p->SelectAllUser2();
        foreach(array_merge($tblLogin, $tblLogin1, $tblLogin2) as $item)
        {
            if($username == $item['tenDangNhap'] && $password == $item['matKhau']){
                
                $_SESSION['login'] = true;
                $_SESSION['is_login'] = array();
                $_SESSION['is_login']['username'] = $item['username'];
                $_SESSION['is_login']['email'] = $item['email'];
                $_SESSION['is_login']['hoTen'] = $item['hoTen'];
                $_SESSION['is_login']['soDienThoai'] = $item['soDienThoai'];
                $_SESSION['is_login']['hinhAnh'] = $item['hinhAnh'];
                $_SESSION['is_login']['Role'] = $item['Role'];

                 return 1;
            } 
        
        } return 0;
    }
    

    function getAllUser()
    {

        $p = new modelLogin();
        $tblLogin = $p->SelectAllUser();
        return $tblLogin;
        
    }
    function getAllUser1()
    {

        $p = new modelLogin();
        $tblLogin = $p->SelectAllUser1();
        return $tblLogin;
        
    }
    function getAllUser2()
    {

        $p = new modelLogin();
        $tblLogin = $p->SelectAllUser2();
        return $tblLogin;
        
    }

    function Register($tenDangNhap,$matKhau, $email,$hoTen, $soDienThoai, $trangthai, $ngayTao )
    {

        $p = new modelLogin();
        $tblLogin = $p->Register($tenDangNhap,$matKhau, $email,$hoTen, $soDienThoai, $trangthai, $ngayTao );

        if($tblLogin ==1){
            return $tblLogin;

        }else {
            return 0;
        }
        
    }
}
?>