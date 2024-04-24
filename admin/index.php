<?php 
  session_start();
  // include config 
  if (empty($_SESSION['login_admin'])){
    include("login.php");
  }elseif (isset($_SESSION['login_admin']) && $_SESSION['login_admin'] == false){
    include("login.php");
  } elseif (isset($_SESSION['login_admin']) && $_SESSION['login_admin'] == true) {
    
  // include header
  include_once("view/layouts/header.php");
  // include slidebar
  include_once("view/layouts/slidebar.php");
  // include content
  // -------MAIN CONTENT HERE
  //--------------------
  //include_once("view/content.php");
  # XEM DOANH NGHIEP
 
 #XEM THONG TIN QUAN LI NHAN VIÊN
  if (isset($_REQUEST["qlnv"])){
    include("view/NhanVienPhanPhoi/quanlinhanvien.php");
  }elseif(isset($_REQUEST["qlkhdn"])){
    include("view/KhachHangDoanhNghiep/quanlikhachhangDN.php");}#THÊM DOANH NGHIỆP
  elseif (isset($_REQUEST["adddn"])){
    include("view/KhachHangDoanhNghiep/adddoanhnghiep.php");
  }#CẬP NHẬT THÔNG TIN DOANH NGHIỆP
  elseif (isset($_REQUEST["updatekh"])) {
    include ("view/KhachHangDoanhNghiep/updatedoanhnghiep.php");
  }#xóa doanh nghiệp
  elseif (isset($_REQUEST["delkh"])) {
    include ("view/KhachHangDoanhNghiep/deldoanhnghiep.php");
  }#XEM KHÁCH HÀNG THÀNH VIÊN
  elseif (isset($_REQUEST["qlkhtv"])){
    include("view/KhachHangThanhVien/quanlithanhvien.php");
  }#THÊM KHÁCH HÀNG THÀNH VIÊN
  elseif (isset($_REQUEST["addtv"])){
    include("view/KhachHangThanhVien/addthanhvien.php");
  }#CẬP NHẬT THÔNG TIN THÀNH VIÊN
  elseif (isset($_REQUEST["updatetv"])) {
    include("view/KhachHangThanhVien/updatethanhvien.php");
  }#XÓA THÀNH VIÊN
  elseif (isset($_REQUEST["deltv"])) {
    include("view/KhachHangThanhVien/delthanhvien.php");
  }
  #XEM NHÀ CUNG CẤP
  elseif (isset($_REQUEST["qlncc"])){
    include("view/NhaCungCap/quanlinhacungcap.php");
  }
  #THÊM NHÂN VIÊN
  elseif (isset($_REQUEST["addnv"])) {
    include("view/NhanVienPhanPhoi/addnhanvien.php");
  }#CẬP NHẬT NHÂN VIÊN
  elseif (isset($_REQUEST["updatenvpp"])){
    include ("view/NhanVienPhanPhoi/updatenv.php");
  }#XÓA NHÂN VIÊN
  elseif (isset($_REQUEST["delnvpp"])) {
    include ("view/NhanVienPhanPhoi/delnhanvienphanphoi.php");
  }
  #XEM TÀI KHOẢN
  elseif (isset($_REQUEST["qltk"])) {
    include("view/TaiKhoan/quanlitaikhoan.php");
  }#THÊM TÀI KHOẢN
  elseif (isset($_REQUEST["addtk"])) {
    include("view/TaiKhoan/addtaikhoan.php");
  }#CẬP NHẬT TÀI KHOẢN
  elseif (isset($_REQUEST["updatetk"])) {
    include("view/TaiKhoan/updatetaikhoan.php");
  }#DELETE TÀI KHOẢN
  elseif (isset($_REQUEST["deletetk"])) {
    include("view/TaiKhoan/deletetaikhoan.php");
  
 }#quản lý loại bài viết
  elseif (isset($_REQUEST['quanliloaibaiviet'])) {
    include("view/LoaiBaiViet/quanliloaibaiviet.php");
  }#đăng bài viết
  elseif (isset($_REQUEST['dangbaiviet'])) {
    include("view/LoaiBaiViet/dangbai.php");
  }
  elseif (isset($_REQUEST['phanhoi'])){
    include("view/vPhanHoi.php");
  }#XEM CÁC CÂU HỎI
  elseif (isset($_REQUEST['qlbt'])){
    include("view/CauHoi/quanlicauhoi.php");
  }#THÊM CÂU HỎI
  elseif (isset($_REQUEST["addcauhoi"])) {
    include("view/CauHoi/addcauhoi.php");
  }#SỬA CÂU HỎI
  elseif (isset($_REQUEST["updatecauhoi"])) {
    include("view/CauHoi/updatecauhoi.php");
  }#DELETE CÂU HỎI
  elseif (isset($_REQUEST["deletecauhoi"])) {
    include("view/CauHoi/delcauhoi.php");
  }
  else {
    //include_once("view/content.php");
  }

  //---------------------
  // -------
  // include footer
  include_once("view/layouts/footer.php");
}
 ?>