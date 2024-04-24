<?php

include_once("Model/mLienHe.php");

class LienHeController {
    private $model;

    public function __construct() {
        $this->model = new LienHeModel();
    }

    public function get_lienhe() {
        $lienhe = $this->model->select_lienhe();
        return $lienhe;
    }

    public function add_lienhe() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tieuDe = $_POST['tieuDe'];
            $noiDung = $_POST['noiDung'];
            $hoTen = $_POST['hoTen'];
            $soDienThoai = $_POST['soDienThoai'];
            $email = $_POST['email'];

            $success = $this->model->insert_lienhe($tieuDe, $noiDung, $hoTen, $soDienThoai, $email);
            if ($success) {
                echo "Thêm liên hệ thành công!";
            } else {
                echo "Thêm liên hệ không thành công.";
            }
        }
    }
}

?>

<?php
include_once("Controller/cLienHe.php");

class ContactController {
    private $model;

    public function __construct() {
        $this->model = new ContactModel();
    }

    public function index() {
        // Hiển thị form liên hệ
		include_once("View/lienhe.php");
    }

    public function sendEmail() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nguoiGui = $_POST['nguoiGui'];
            $email = $_POST['email'];
            $noiDung = $_POST['noiDung'];

            // Địa chỉ email nhận
            $to = 'xuanhauk16@gmail.com'; // Thay đổi thành địa chỉ email của bạn
            $subject = 'New Contact Form Submission';

            $success = $this->model->sendEmail($to, $subject, $noiDung, $nguoiGui, '', $email);
            if ($success) {
                echo "Email sent successfully!";
            } else {
                echo "Failed to send email.";
            }
        }
    }
}

// Routing
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = new ContactController();
$controller->$action();
?>