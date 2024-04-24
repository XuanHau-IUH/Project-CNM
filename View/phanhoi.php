<!-- Header Start -->
<!-- <div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Phản hồi giáo viên</h3>
    </div>
</div> -->
<!-- Header End -->
<!-- Blog Start -->
<!-- <div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Giáo viên</span></p>
            <h1 class="mb-4">Danh sách giáo viên</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="img/team-1.jpg" alt="">
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">Lê Thị Hòa</h4>
                        <p>Tôi đã hoạt động trong lĩnh vực tự kỷ này trong suốt 8 năm qua và đã có cơ hội làm việc với nhiều học sinh có nhu cầu đặc biệt khác nhau... </p>
                        <a href="index.php?phanhoi1" class="btn btn-primary px-4 mx-auto my-2">Chọn</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="img/team-2.jpg" alt="">
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">Nguyễn Thanh Hoàng</h4>
                        <p>Đam mê của tôi là đảm bảo rằng mỗi học sinh đều có một môi trường học tập an toàn và khuyến khích, 
                         giúp họ phát triển toàn diện cả về kiến thức và kỹ năng sống...</p>
                        <a href="index.php?phanhoi2" class="btn btn-primary px-4 mx-auto my-2">Chọn</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="img/team-3.jpg" alt="">
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">Trương Thị Huệ</h4>
                        <p>Tôi luôn tự đặt mình vào vị trí của học sinh, giúp họ cảm thấy tự tin và đồng thời khuyến khích họ khám phá tiềm năng trong bản thân...</p>
                        <a href="index.php?phanhoi3" class="btn btn-primary px-4 mx-auto my-2">Chọn</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="img/team-4.jpg" alt="">
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">Trần Văn Tuấn</h4>
                        <p>Tôi luôn tin rằng mỗi học sinh đều có tiềm năng đáng kinh ngạc và tôi cam kết hỗ trợ họ trên con đường thành công...</p>
                        <a href="index.php?phanhoi4" class="btn btn-primary px-4 mx-auto my-2">Chọn</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="img/testimonial-1.jpg" alt="">
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">Phạm Văn Nam</h4>
                        <p>Tôi tin rằng mỗi học sinh đều có thể học tốt nếu được đồng hành và hỗ trợ chính xác, và tôi cam kết làm việc chăm chỉ để đảm bảo sự phát triển toàn diện cho mỗi em...</p>
                        <a href="index.php?phanhoi5" class="btn btn-primary px-4 mx-auto my-2">Chọn</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="img/testimonial-2.jpg" alt="">
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">Nguyễn Thị Ánh Thư</h4>
                        <p>Niềm đam mê của tôi là giúp các em khám phá thế giới xung quanh thông qua phương tiện khác nhau, bổ sung kiến thức và kỹ năng của mình...</p>
                        <a href="index.php?phanhoi6" class="btn btn-primary px-4 mx-auto my-2">Chọn</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div> -->
<!-- Blog End -->

<?php
include_once("Controller/cPhanHoi.php");
// Lấy danh sách các đơn vị trắc nghiệm
$phanhoi = new cPhanHoi();
$testUnits = $phanhoi->getTestCV();
// Hiển thị danh sách các đơn vị trắc nghiệm
?>
<div class="container my-3">
    <h1 style="text-align: center;">Danh sách phản hồi chuyên viên</h1>
    <?php
    // Lặp qua mỗi đơn vị trắc nghiệm
    foreach ($testUnits as $unit) {
        // Lấy thông tin về đơn vị trắc nghiệm
        // $idUnit = $unit['idUnit']; // Giả sử id của đơn vị được lưu trong cột id trong cơ sở dữ liệu
        // $unitName = $unit['tenUnit']; // Giả sử tên đơn vị được lưu trong cột unit_name trong cơ sở dữ liệu
        // $moTaUnit = $unit['moTaUnit']; // Giả sử mô tả đơn vị được lưu trong cột unit_description trong cơ sở dữ liệu
        $idChuyenVien = $unit['idChuyenVien']; // Giả sử id của đơn vị được lưu trong cột id trong cơ sở dữ liệu
        $hinhanh = $unit['hinhAnh']; // Giả sử tên đơn vị được lưu trong cột unit_name trong cơ sở dữ liệu
        $ChuyenVienName = $unit['hoTen']; // Giả sử tên đơn vị được lưu trong cột unit_name trong cơ sở dữ liệu
        $moTaChuyenVien = $unit['moTa']; // Giả sử mô tả đơn vị được lưu trong cột unit_description trong cơ sở dữ liệu

    ?>
        <div class="screening-card">
            <div class="screening-card-header" style="color:Black;">Phản hồi chuyên viên <?= $ChuyenVienName ?></div>
            <div class="screening-card-body">
                <img class="card-img-top mb-2" src="<?= $hinhanh ?>" alt="" style="width: 100px; height: 100px; border-radius: 50px;">
                <!-- Thay đổi nội dung phần mô tả tùy thuộc vào cấu trúc dữ liệu của bạn -->
                <p><?= $moTaChuyenVien ?></p>
                <!-- Tạo liên kết đến trang làm bài với idUnit tương ứng -->
                <a href="index.php?phanhoigiaovien=<?= $idChuyenVien ?>&idChuyenVien=<?= $idChuyenVien ?>" class="btn btn-primary btn-screening">Chọn</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
