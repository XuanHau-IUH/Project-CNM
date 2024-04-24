<?php 

	include_once("model/KhachHangDoanhNghiep/mdoanhnghiep.php");

	class cKHDN{
        //--------------THỐNG KÊ
        //
        #THỐNG KÊ SỐ LƯỢNG KHÁCH HÀNG DOANH NGHIỆP
        public function count_dn(){
            $p = new mKhachHangDoanhNghiep();
            $table = $p -> count_dn();
            return $table;
        }
        //
        //------------------------------------------
        #xem doanh nghiệp
		public function select_KHDN(){
			$p = new mKhachHangDoanhNghiep();
			$table = $p -> select_KHDN();
			return $table;
		}
        public function select_doanhnghiep_byid_xa($idPhuHuynh){
            $p= new mKhachHangDoanhNghiep();
            $table = $p->select_doanhnghiep_id($idPhuHuynh);
            //  var_dump($table);
            return $table;
        }
        
        #Hiển thị  doanh nghiệp id
      
        #update doanh nghiệp
        // 
        // CẬP NHẬT KHÁCH HÀNG KHÔNG USERNAME
        // 
		public function update_DN($idPhuHuynh,$email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh){
            $p = new mKhachHangDoanhNghiep();
            $update = $p -> update_KHDN($idPhuHuynh,$email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh);
            // var_dump($update);
            if($update){
                return 1; //cập nhật thành công
            }else{
                return 0; //cập nhật không thành công
            }
        }
        #update doanh nghiệp có username
        public function update_DN1($idPhuHuynh,$username){
            $p = new mKhachHangDoanhNghiep();
            $update = $p -> update_KHDN1($idPhuHuynh,$username);
            // var_dump($update);
            if($update){
                return 1; //cập nhật thành công
            }else{
                return 0; //cập nhật không thành công
            }
        }
        #update tài khoản
        public function update_taikhoan($username,$usernamecu,$password){
            $p=new mtaikhoan;
            $update=$p->updatetaikhoan($username,$usernamecu,$password);
            // var_dump ($update);
            if($update){
                return 1; //update thành công
            }else {
                return 0; //update thất bại
            }
        }
        #thêm doanh nghiệp
        public function add_DN($email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh, $username){
            $p = new mKhachHangDoanhNghiep();
            $insert = $p->add_KHDN($email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh, $username);
            // var_dump($insert);
            if($insert){
                return 1;// thêm thành công
            }else {
                return 0;//thêm không thành công
            }
           
        }
        #THÊM USERNAME CHO DOANH NGHIỆP CHƯA CÓ TÀI KHOẢN TRÊN BẢNG KHÁCH HÀNG
        public function UPDATE_KHDN_USERNAME($idPhuHuynh,$username){
            $p = new mKhachHangDoanhNghiep();
            $update = $p->update_khdn_username($idPhuHuynh,$username);
            // var_dump($update);
            if($update){
                return 1;// thêm thành công
            }else {
                return 0;//thêm không thành công
            }
           
        }





        // #kiem tra user có trong bảng tài khoản
        // public function check_user($username){
        //     $p= new mKhachHangDoanhNghiep();
        //     $table = $p -> checkuser($username);
		// 	return $table;
		// }
       
        #xóa khách hàng doanh nghiệp
        function delete_khachhangdoanhnghiep($idPhuHuynh){
			$p = new mKhachHangDoanhNghiep();
			$table  = $p -> del_KHDN($idPhuHuynh);
// 			var_dump($table);
			// return $table;
            if($table){
                return 1; //Xóa thành công
            }else {
                return 0;// Xóa không thành công
            }
		}
	}

 ?>