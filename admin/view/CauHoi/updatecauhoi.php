<?php
    include("controller/CauHoi/cCauHoi.php");
    $idcauHoi = $_REQUEST['idcauHoi'];
    $p = new cCauHoi();
    $table = $p-> select_cauhoi_id($idcauHoi);
     $list_loai  = $p->select_unit();
?> 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý Câu Hỏi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý Câu Hỏi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Danh sách thông tin khách hàng</h3>  | <a href="#">Thêm khách hàng mới</a> -->

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>-->
              <!-- /.card-header -->
              <h3 style="text-align:center">Cập nhật câu hỏi</h3>
              <form action="#" method="post">
                <div class="row">
                  <div class="col">
                    <?php
                    // var_dump ($table);
                      if($table){
                        if(mysqli_num_rows($table)>0){
                          while ($row=mysqli_fetch_assoc($table)) {
                            echo "<tr>";
                            echo "<td>ID Cau Hoi:</td>";
                            echo "<td>";
                        
                          echo "<td><input type='text' class='form-control' name='idcauhoi' value='" . $row['idcauHoi'] . "'></td>";
                          echo "</td>";
                          echo "</tr>";

                             echo "<tr>";
                            echo "<td>Cau Hoi:</td>";
                            echo "<td>";
                        
                          echo "<td><input type='text' class='form-control' name='cauhoi' value='" . $row['cauHoi'] . "'></td>";
                          echo "</td>";
                          echo "</tr>";
            
                            echo "</br>";
                            echo "<td>Câu 1</td>";
                            echo "<td><input type='text' class='form-control' name='cau1'  value='" . $row['cau1'] . "'></td>";
                            echo "<td>Câu 2</td>";
                            echo "<td><input type='text' class='form-control' name='cau2'  value='" . $row['cau2'] . "'></td>";
                            echo "<td>Câu 3</td>";
                            echo "<td><input type='text' class='form-control' name='cau3'  value='" . $row['cau3'] . "'></td>";
                            echo "<td>
                    <select name='unit'  class='form-control'>
                      <option value='0'>chọn unit...</option>";
            foreach ($list_loai as $title_item) {
              echo "<option value='" . $title_item['idUnit'] . "'>" . $title_item['tenUnit'] . "</option>";
            }
            echo "</select>
                  </td>";
            echo "</tr>"; // End row
            echo "</table>"; // End table
                        
                          
                           
                            
                          }
                          
                        }
                      }
                      
                      
                    ?>
                  <br>

                  <button type="submit" class="btn btn-primary" name="submit" style="margin-left:45%">Submit</button>
                  <button type="reset" class="btn btn-primary" name="reset">Reset</button>
                </form>
             
                  </div>
                  
                </div>
                
             
            </div>
            
            <!-- /.card -->
          </div>
        </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  if(isset($_REQUEST["submit"])){
    // $MaVaiTro=$_REQUEST["mavaitro"];
    $idcauHoi = $_REQUEST["idcauHoi"];
    $cauHoi=$_REQUEST["cauhoi"];
    $cau1=$_REQUEST["cau1"];
    $cau2=$_REQUEST["cau2"];
    $cau3=$_REQUEST["cau3"];
    $idUnit = $_REQUEST["unit"];
    // echo $MaVaiTro;
    echo $cauHoi;
    echo $cau1;
    // var_dump ($password);
    // var_dump ($username);
    $p=new cCauHoi();
    $table=$p->update_cauhoi($idcauHoi,$cauHoi,$cau1,$cau2,$cau3,$idUnit);
    if($table==1){
      echo "<script>alert('Cập nhật thành công')</script>";
    }else {
      echo "<script>alert('Cập nhật khong thành công')</script>";
    }
  }
?>
  