<?php
    include("controller/NhanVienPhanPhoi/cnvphanphoi.php");
    include_once("controller/TaiKhoan/ctaikhoan.php");
    $MaNVPP = $_REQUEST['MaNVPP'];
    echo $MaNVPP;
    $p = new cNVPP();
    $a= new ctaikhoan();
    $table = $p-> select_nhanvien_byid($MaNVPP);
    // var_dump($table);
?>
<div class="content-wrapper">
    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div  class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Cập nhật tài khoản</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label >Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label> Username </label>
                <input type="text" name="usernamecu" id="username1" class="form-control" placeholder="Enter First Name" readonly>
              </div>
          
              <div class="form-group">
                <label> Password </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
              <button type="submit" name="submit1" class="btn btn-primary" >Cập nhật</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật thông tin nhân viên phân phối</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý nhân viên phân phối</li>
            </ol>
          </div>
        </div>
      </div> <!-- /.container-fluid -->
    </section>
    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

          </div>
          <div class="col-md-6">

          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="text-align:center">Thông tin nhân viên phân phối</h3>
                <?php
                  if ($table){
                    if (mysqli_num_rows($table)>0) {
                      while ($row=mysqli_fetch_assoc($table)){
                ?>
                <form action="#" method="post" enctype="multipart/form-data">
                  <div class="row-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <td>
                                    <?php
                                      if($row["HinhAnh"] == NULL){
                                        echo "<td><img src='assets/uploads/images/user.png' alt='' height='200px' width='300px'style='border-radius:50px' ></td>";
                                      }else {
                                        echo "<td><img src='../assets/uploads/avatar/".$row['HinhAnh']."' alt='' height='200px' width='300px'style='border-radius:50px' ></td>";
                                        // echo "<td><img src='assets/uploads/images/".$row['HinhAnh']."' alt='' height='200px' width='300px'></td>";
                                      }
                                    ?> 
                          </td>
                      </div>
                      <div class="col-md-4">                      
                        <td>Mã nhân viên phân phối</td>
                        <td><input type='text' class='form-control' name='manvpp' value="<?php echo $row['MaNVPP'] ?>" readonly></td>
                        <td>Tên nhân viên phân phối</td>
                        <td><input type='text' class='form-control' name='tennvpp' value="<?php echo $row['TenNVPP'] ?>"></td>
                        <td>Giới tính</td>
                        <td>
                          <select name="gioitinh" id="gioitinh" class="form-control" readonly>
                            <option value="<?php echo $row['GioiTinh'] ?>">Nam</option>
                            <option value="<?php echo $row['GioiTinh'] ?>">Nữ</option>
                          </select>
                        </td>
                        <td>Địa chỉ</td>
                        <td><input type='text' class='form-control' name='diachi' value="<?php echo $row['DiaChi'] ?>"></td>
                        <td>Mã xã</td>
                        <div class="input-group mb-3">
                          <select class="form-control" name="tinh" id="tinh" required>
                            <?php 
              
                              $tinh = new cDiaChi();
                                $option_tinh = $tinh -> select_tinhthanh();
                                        //
                                while($row1 = mysqli_fetch_array($option_tinh,MYSQLI_ASSOC)) {
                                  if ($row['MaTinh'] == $row1['MaTinh']) {
                                    echo "<option value=".$row1['MaTinh']." selected>".$row1['TenTinh']."</option>";
                                  } else {
                                    echo "<option value=".$row1['MaTinh'].">".$row1['TenTinh']."</option>";
                                  }
                                            
                                }
              
                            ?>    
                          </select>
                    
                        </div>
                        <div class="input-group mb-3">  
                          <select class="form-control" name="huyen" id="huyen" required> 
                            <?php 

                              $tinh = new cDiaChi();
                              $option_tinh = $tinh -> select_huyenquan($row['MaTinh']);
                                          //
                              while($row1 = mysqli_fetch_array($option_tinh,MYSQLI_ASSOC)) {
                                if ($row['MaHuyen'] == $row1['MaHuyen']) {
                                  echo "<option value=".$row1['MaHuyen']." selected>".$row1['TenHuyen']."</option>";
                                } else {
                                  echo "<option value=".$row1['MaHuyen'].">".$row1['TenHuyen']."</option>";
                                }
                                            
                              }

                            ?>  
                            </select> 
                        </div>
                                  <div class="input-group mb-3">
                                    <select class="form-control" name="xa" id="xa" required>
                                      <?php 
                                        $tinh = new cDiaChi();
                                        $option_tinh = $tinh -> select_xaphuong($row['MaHuyen']);
                                          //
                                        while($row1 = mysqli_fetch_array($option_tinh,MYSQLI_ASSOC)) {
                                          if ($row['MaXa'] == $row1['MaXa']) {
                                            echo "<option value=".$row1['MaXa']." selected>".$row1['TenXa']."</option>";
                                          } else {
                                            echo "<option value=".$row1['MaXa'].">".$row1['TenXa']."</option>";
                                          }
                                            
                                        }

                                      ?>  
                                    </select>
                                  </div>
                      </div>
                      <div class="col-md-4">
                        <td>Ngày sinh</td>
                        <td><input type='date' class='form-control' name='ngaysinh' value="<?php echo $row['NgaySinh'] ?>"></td>
                        <td>Số Điện Thoại</td>
                        <td><input type='text'class='form-control' name='sdt' value="<?php echo $row['SDT'] ?>"></td>
                        <td>Email</td>
                        <td><input type='text'class='form-control' name='email' value="<?php echo $row['Email'] ?>"></td>
                      </div>
                          <button type="submit" class="btn btn-primary" name="submit" style="margin-left:50%">Cập nhật</button>
                          <!-- <button type="submit" class="btn btn-primary" name="reset" >Hủy</button> -->
                    </div>
                    </div>
                  </div>
                </form>
                  <table>
                    <h3 style="text-align:center">Thông tin tài khoản</h3>
                    <thead>
                      <tr>
                        <th style="text-align:center">Username</th>
                        <!-- <th style="text-align:center">Password</th> -->
                        <th style="text-align:center">Tác vụ</th>                 
                      </tr>
                    </thead>
                    <tr>
                      <!-- <td style="display: none"><?php echo $row['username']; ?></td> -->
                      <!-- <td style="display: none"><?php echo $row['password']; ?>  </td> -->
                      <!-- <td><input type='text'class='form-control' name='txtusername' value="<?php echo $row['username'] ?>" readonly></td> -->
                      <!-- <td><input type='password'class='form-control' name='txtpassword' value="<?php echo $row['password'] ?>" readonly></td> -->
                      <td style="text-align:center" readonly><?php echo $row['username']; ?></td>
                      <!-- <td style="text-align:center" readonly><?php echo $row['password']; ?></td>                     -->
                      <td style="text-align:center">
                        <button type="button" class="btn btn-info editbtn"> CẬP NHẬT TÀI KHOẢN </button>
                      </td>
                    </tr>
                  </table>
                  <div>
                    <?php
                          }
                        }
                      } 
                    ?>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
<?php
  if(isset($_REQUEST["submit"])){
    $MaNVPP=$_REQUEST["manvpp"];
    $TenNVPP=$_REQUEST["tennvpp"];
    $SDT=$_REQUEST["sdt"];
    $DiaChi=$_REQUEST["diachi"];
    $NgaySinh=$_REQUEST["ngaysinh"];
    $Email=$_REQUEST["email"];
    $GioiTinh=$_REQUEST["gioitinh"];
    $MaXa=$_REQUEST["xa"];
    $MaVaiTro=2;
    $p= new cNVPP();
      $update=$p->update_nhanvienphanphoi($MaNVPP, $TenNVPP, $SDT, $DiaChi, $NgaySinh, $Email,$GioiTinh,$MaXa);
          
      if($update==1){
        echo "<script>alert('Cập nhật thành công');</script>";
        echo "<script>window.location.href='?qlnv'</script>";
      }else {
        echo "<script>alert('Cập nhật không thành công');</script>";
        echo "<script>window.location.href='?qlnv'</script>";
      }
  }
?>
<script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#username').val(data[0]);
                $('#username1').val(data[0]);

            });
        });
</script>
<?php
  if(isset($_REQUEST["submit1"])){
    $username =$_REQUEST["username"];
    //echo $username;
    $usernamecu=$_REQUEST["usernamecu"];
    echo $usernamecu;
    $password=$_REQUEST["password"];
    //echo $password;
    $MaVaiTro=2;
    $p = new cNVPP();
    $tk = new ctaikhoan();



    if($usernamecu == ""){
      $check_user_kh = $tk -> check_user_khachhang($username);
      if (mysqli_num_rows($check_user_kh)>0){
        echo "<script>alert('Tài khoản mới đã tồn tại trong bảng người dùng');</script>";
      }else{
        $check_taikhoan = $tk -> check_taikhoan($username);
        if (mysqli_num_rows($check_taikhoan)>0) {
          echo "<script>alert('Tài khoản mới đã tồn tại trong bảng tài khoản');</script>";
        }else {
          $update= $p->UPDATE_NVPP_USERNAME($MaNVPP,$username);
          if ($update=1){
            $insert=$tk->add_taikhoan($MaVaiTro, $username,$password);
          if ($insert=1){
            echo "<script>alert('Cập nhật thành công');</script>";
            echo "<script>window.location.href= 'index.php?qlnv'</script>";
          }else {
            echo "<script>alert('Cập nhật thông thành công');</script>";
            echo "<script>window.location.href= 'index.php?qlnv'</script>";
          }
          } 
        }
      }
      
      // echo "XỬ LÍ CHÈN TÀI KHOẢN NGƯỜI DÙNG TRƯỚC , SAU ĐÓ CHÈN TK";
    } else{

      if ($username == $usernamecu){
        $update= $tk-> update_matkhau_username($username,$password);
        if ($update=1){
          echo "<script>alert('Cập nhật thành công');</script>";
          echo "<script>window.location.href= 'index.php?qlnv'</script>";
        }else {
          echo "<script>alert('Cập nhật không thành công');</script>";
          echo "<script>window.location.href= 'index.php?qlnv'</script>";
        }
        // echo "XỬ LÝ ĐỔI MẬT KHẨU";
      }else{
        $check_user_kh = $tk -> check_user_khachhang($username);
        if (mysqli_num_rows($check_user_kh)>0){
          echo "<script>alert('Tài khoản mới đã tồn tại trong bảng người dùng');</script>";
        } else{
          $check_taikhoan = $tk -> check_taikhoan($username);
          if (mysqli_num_rows($check_taikhoan)>0) {
            echo "<script>alert('Tài khoản mới đã tồn tại trong bảng tài khoản');</script>";
          } else{
              $update= $p->UPDATE_NVPP_USERNAME($MaNVPP,$username);
              if ($update=1) {
                $update= $tk->update_taikhoan($username, $usernamecu,$password);
                if ($update=1) {
                  echo "<script>alert('Cập nhật thành công');</script>";
                  
                }else {
                  echo "<script>alert('Cập nhật không thành công');</script>";
                  echo "<script>window.location.href= 'index.php?qlnv'</script>";
                }
              }
            // echo "XỬ LÍ CẬP NHẬT TÀI KHOẢN VÀ MK";
            }
          
        }
        
      }
    }

  }
?>
