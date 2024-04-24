<?php
include_once("Model/Connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class mPhanHoi
{
    function getTestCV()
    {
        $conn;
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM chuyenvien";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            return $table;
        } else {
            return false;
        }
    }

    public function select_ChuyenVien($idChuyenVien)
    {
        $conn;
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM chuyenvien WHERE  idChuyenVien = '$idChuyenVien'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            return $table;
        } else {
            return false;
        }
    }
    //function lưu phản hồi
    
}

?>

<?php 
class PhanHoiModel
{
    public function sendEmailPH($to, $hoTen, $soDienThoai, $chatLuong, $noiDungPhanHoi, $email)
    {
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
        $mail->isHTML(true);
        $mail->Subject = 'Phản hồi từ phụ huynh';
        $mail->Body = 'Chất lượng: ' . $chatLuong . '<br>';
        $mail->Body .= 'Nội dung phản hồi: ' . $noiDungPhanHoi;

        // Gửi email
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}

?>