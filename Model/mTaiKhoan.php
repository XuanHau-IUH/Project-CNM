<?php 

include_once("Model/Connect.php");

class mTaiKhoan{

	public function login($username, $password){
		$conn;
		$p = new clsketnoi();
		if($p -> ketnoiDB($conn)){
			$sql = "SELECT * FROM taikhoan1 WHERE username = '".$username."' and password = '".$password."'";
			$result = mysqli_query($conn,$sql);
			$p -> dongketnoi($conn);
			return $result;
		}else{
			return false;
		}
		
	}

	//hàm thêm tài khoản 
	public function add_taikhoan($username,$password,$Role){
		$conn;
		$p = new clsketnoi();
		if($p -> ketnoiDB($conn)){
			$password = md5($password);
			$sql = "INSERT INTO taikhoan1(username, password, Role) VALUES ";
			$sql .= "('".$username."','".$password."',".$Role.")";
			$result = mysqli_query($conn,$sql);
			$p -> dongketnoi($conn);
			return $result;
		}else{
			return false;
		}
	}
	//hàm lấy thông tin người dùng đã đăng nhập vào tài khoản
	public function select_tt_taikhoan($username,$Role){
		$conn;
		$p = new clsketnoi();
		if($p -> ketnoiDB($conn)){
			if ($Role == 1) {
				$sql = "SELECT * FROM taikhoan1 JOIN admin ON taikhoan1.username = admin.username WHERE taikhoan1.Role=1";
			}elseif ($Role == 2){
				$sql = "SELECT * FROM taikhoan1 JOIN phuhuynh on taikhoan1.username = phuhuynh.username WHERE taikhoan1.Role=2";
			}elseif ($Role == 3){
				$sql = "SELECT * FROM taikhoan1 JOIN chuyenvien ON taikhoan1.username = chuyenvien.username WHERE taikhoan1.Role=3";
			}elseif ($Role == 4){
				$sql = "SELECT * FROM taikhoan1 JOIN quantrivien ON taikhoan1.username = quantrivien.username where taikhoan1.Role=4";
			}else{
                $sql = "SELECT * FROM taikhoan1 WHERE username = '".$username."'";
            }

			$result = mysqli_query($conn,$sql);
			$p -> dongketnoi($conn);
			return $result;
		}else{
			return false;
		}
	}
}

?>