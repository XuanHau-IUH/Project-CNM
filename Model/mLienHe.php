<?php
include_once("Model/Connect.php");

class LienHeModel
{
    //---------------------------
    //---------------------------
    //---------------------------
    //---------------------------
    //-----LẤY DỮ LIỆU PHẢN HỒI CỦA NGƯỜI DÙNG 
    //---------------------------
    //---------------------------
    //---------------------------
    public function select_lienhe()
    {
        $conn;
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $query = "SELECT * FROM lienhe";
            $result = mysqli_query($conn, $query);
            $p->dongketnoi($conn);
            return $result;
        } else {
            return false;
        }
    }

    //---------------------------
    //---------------------------
    //---------------------------
    //---------------------------
    //-----THÊM DỮ LIỆU PHẢN HỒI KHÁCH HÀNG
    //---------------------------
    //---------------------------
    //---------------------------
    public function insert_lienhe($tieuDe, $noiDung, $hoTen, $soDienThoai, $email)
    {
        $conn;
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $query = "INSERT INTO lienhe (tieuDe, noiDung, nguoiGui, soDienThoai, email) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $tieuDe, $noiDung, $hoTen, $soDienThoai, $email);
            $result = mysqli_stmt_execute($stmt);
            $p->dongketnoi($conn);
            return $result;
        } else {
            return false;
        }
    }
}


?>
<?php
include_once("Model/Connect.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


class ContactModel {
    public function sendEmail($to, $tieuDe, $noiDung, $hoTen, $soDienThoai, $email) {
        // Khởi tạo đối tượng PHPMailer
        $mail = new PHPMailer(true);
        
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Thay đổi thành máy chủ SMTP của bạn
        $mail->SMTPAuth = true;
        $mail->Username = 'xuanhauk16@gmail.com';        
        $mail->Password = 'tppk rcma jdtz xafd';                      
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Thiết lập thông tin người gửi
        $mail->setFrom($email, $hoTen, $soDienThoai);

        // Thiết lập thông tin người nhận
        $mail->addAddress($to);

        // Thiết lập tiêu đề và nội dung email
        $mail->Subject = $tieuDe;
        $mail->Body = $noiDung;

        // Gửi email
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}


?>