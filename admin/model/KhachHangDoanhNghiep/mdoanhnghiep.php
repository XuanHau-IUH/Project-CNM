<?php 

	include_once("model/connect.php");

	class mKhachHangDoanhNghiep{
		//--------------THỐNG KÊ
		//
		#THỐNG KÊ SỐ LƯỢNG KHÁCH HÀNG DOANH NGHIỆP
		public function count_dn(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "SELECT count(*) FROM phuhuynh";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				//
				return $table;
			}else{
				return false;
			}
		}
		//
		//------------------------------------------
		#xem doanh nghiệp
		public function select_KHDN(){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "SELECT * FROM phuhuynh";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				//
				return $table;
			}else{
				return false;
			}
		}
		
		#THÊM THÔNG TIN DOANH NGHIỆP 
		public function add_KHDN($email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh, $username){
			$conn;
			$p = new ketnoi();
			if($p->moketnoi($conn)){
				if ($username !="") {
					$string="insert into phuhuynh(email,hinhAnh,hoTen,soDienThoai,gioiTinh, username) values";
                	$string .= "('".$email."','".$hinhAnh."','".$hoTen."','".$soDienThoai."','".$gioiTinh."','".$username."')";
				}else {
					$string="insert into khachhang(email,hinhAnh,hoTen,soDienThoai,gioiTinh) values";
                	$string .= "('".$email."','".$hinhAnh."','".$hoTen."','".$soDienThoai."','".$gioiTinh."')";
				}
				
                $table=mysqli_query($conn,$string);
                // echo $string;
                $p->dongketnoi($conn);
				// var_dump($table);
                return $table;
            }else{
                return false;
            }
		}
		#THÊM USERNAME CHO DOANH NGHIỆP CHƯA CÓ TÀI KHOẢN TRÊN BẢNG KHÁCH HÀNG
		public function update_khdn_username($idPhuHuynh,$username){
			$conn;
			$p = new ketnoi();
			if($p->moketnoi($conn)){
					$string ="update khachhang";
					$string .= " set username='".$username."'";
					$string .= " Where idPhuHuynh='".$idPhuHuynh."'";
                $table=mysqli_query($conn,$string);
                // echo $string;
                $p->dongketnoi($conn);
				// var_dump($table);
                return $table;
            }else{
                return false;
            }
		}
		#Hiển thị doanh nghiệp theo MAKH
		public function select_doanhnghiep_id($idPhuHuynh){
			$conn;
			$p= new ketnoi();
			if($p->moketnoi($conn)){
				$string="SELECT * FROM phuhuynh
						WHERE idPhuHuynh ='".$idPhuHuynh."'";
				// echo $string;
				$table=mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;
						
			}else{
				return false;
			}
			
		}
		#UPDATE KHACH HANG DOANH NGHIEP
		public function update_KHDN($idPhuHuynh,$email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh){
			$conn;
			$p= new ketnoi();
			if($p->moketnoi($conn)){
				// if($username !=""){
					$string ="update phuhuynh";
					$string .= " set idPhuHuynh='".$idPhuHuynh."', email='".$email."', hinhAnh='".$hinhAnh."', hoTen='".$hoTen."', soDienThoai='".$soDienThoai."', gioiTinh='".$gioiTinh."'";
					$string .= " Where idPhuHuynh='".$idPhuHuynh."'";
				// }else {
					// $string ="update khachhang";
					// $string .= " set MaKH='".$MaKH."', TenKH='".$TenKH."', Diachi='".$DiaChi."', SDT='".$SDT."', Email='".$Email."', GioiTinh='".$GioiTinh."', TenDoanhNghiep='".$TenDoanhNghiep."', GioiThieu='".$GioiThieu."', MaXa='".$MaXa."'";
					// $string .= " Where MaKH='".$MaKH."'";
				// }
				// echo $string;
				// echo $username;
				$table =mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;

			}else {
				return false;
			}
		}
		#UPDATE KHACH HANG DOANH NGHIEP CO USERNAME
		public function update_KHDN1($idPhuHuynh,$username){
			$conn;
			$p= new ketnoi();
			if($p->moketnoi($conn)){
				
					$string ="update phuhuynh";
					$string .= " set username='".$username."'";
					$string .= " Where idPhuHuynh='".$idPhuHuynh."'";
				
				// echo $string;
				// echo $username;
				$table =mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;

			}else {
				return false;
			}
		}
		#UPDATE TAI KHOAN KHACH HANG
		public function updatetaikhoan($username,$password){
            $conn;
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                // $password=md5('1');
                $string="update taikhoan1";
                $string .=" set username='".$username."', password='".$password."'";
                $string .= "where username='".$username."'";
                // echo $string;
                $table = mysqli_query($conn, $string);
				// var_dump($table);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
		#KIEM TRA TAI KHOAN DOANH NGHIEP Có Trong bảng tài khoản
		// public function checkuser($username){
		// 	$conn;
		// 	$p= new ketnoi();
		// 	if($p->moketnoi($conn)){
		// 		$string="SELECT * FROM khachhang WHERE username IN (SELECT username FROM taikhoan) && username = '".$username."'";
		// 		echo $string;
		// 		$table= mysqli_query($conn,$string);
		// 		$p->dongketnoi($conn);
		// 		var_dump($table);
		// 		return $table;
		// 	}else {
		// 		return false;
		// 	}
		// }
		
		#XÓA DOANH NGHIỆP
		function del_KHDN($idPhuHuynh){
			$conn;
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "Delete FROM phuhuynh where idPhuHuynh='".$idPhuHuynh."'";
				// echo $string;
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				// var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
	}	
?>