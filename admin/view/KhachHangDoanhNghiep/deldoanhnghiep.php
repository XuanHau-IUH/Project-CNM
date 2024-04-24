<?php
include("controller/KhachHangDoanhNghiep/cdoanhnghiep.php");
include_once("controller/TaiKhoan/ctaikhoan.php");
	if(isset($_REQUEST['MaKH'])&& isset($_REQUEST['username'])){
		$MaKH = $_REQUEST['MaKH'];
		$username = $_REQUEST['username'];
		$p = new cKHDN();
	    $tk = new ctaikhoan();
		$delete = $p -> delete_khachhangdoanhnghiep($MaKH);
		if($delete=1){
			$delete= $tk-> delete_taikhoan($username);
			if ($delete=1) {
				echo "<script>alert('Xóa thành công');</script>";
				echo "<script>window.location.href='?qlkhdn'</script>";
			}else{
            	echo "<script>alert('Xóa không thành công');</script>";
            	echo "<script>window.location.href='?qlkhdn'</script>";
			}	
		}
	}
  
?>    