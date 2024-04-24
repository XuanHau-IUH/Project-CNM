<?php
include_once("Controller/cTracNghiem.php");

// Xử lý yêu cầu và lấy danh sách câu hỏi từ cơ sở dữ liệu
if (isset($_GET['idUnit'])) {
    // Lấy idUnit từ URL
    $idUnit = $_GET['idUnit'];

    // Thực hiện truy vấn cơ sở dữ liệu để lấy danh sách câu hỏi trong đơn vị trắc nghiệm tương ứng
    $tracnghiem = new cTracNghiem();
    $questions = $tracnghiem->select_tracnghiem($idUnit);

    // Hiển thị danh sách câu hỏi và chức năng gửi kết quả
    if ($questions) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the test result submission
            $answer = $_POST['answer'] ?? [];
            $idPhuHuynh = $_POST['idPhuHuynh'] ?? 2;
            $idTaiKhoan = $_POST['idTaiKhoan'] ?? 2;

            $totalScore = 0;
            foreach ($answer as $answer) {
                switch ($answer) {
                    case 'a':
                        $totalScore += 5;
                        break;
                    case 'b':
                        $totalScore += 3;
                        break;
                    case 'c':
                        $totalScore += 2;
                        break;
                }
            }

            if ($totalScore < 50) {
                $result = "Không đạt";
            } elseif ($totalScore >= 50 && $totalScore < 70) {
                $result = "Khá";
            } else {
                $result = "Giỏi";
            }
            // Hiển thị điểm số và kết quả
            echo "<p>Tổng điểm: $totalScore</p>";
            echo "<p>Kết quả: $result</p>";
        }
?>
        <div style="overflow: auto; max-height: 500px;">
            <h1 style="text-align: center;">Trắc nghiệm Unit <?= $idUnit ?></h1>
            <form action="index.php?lambaitracnghiem=<?= $idUnit ?>&idUnit=<?= $idUnit ?>" method="post">
                <?php
                foreach ($questions as $key => $question) {
                    echo "<div>";
                    echo "<p>Câu " . ($key + 1) . ": " . $question['cauHoi'] . "</p>";
                    echo "<label><input type='radio' name='answer[$key]' value='a'> " . $question['cau1'] . "</label><br>";
                    echo "<label><input type='radio' name='answer[$key]' value='b'> " . $question['cau2'] . "</label><br>";
                    echo "<label><input type='radio' name='answer[$key]' value='c'> " . $question['cau3'] . "</label><br>";
                    echo "<input type='hidden' name='idcauHoi[]' value='" . $question['idcauHoi'] . "'>";
                    echo "</div>";
                }

                ?>
                <input type="hidden" name="idUnit" value="<?= $idUnit ?>">
                <br>
                <button type="submit" class="btn btn-primary px-4">Nộp bài</button>
            </form>
        </div>
<?php
    } else {
        echo "Không thể lấy danh sách câu hỏi.";
    }
} else {
    // Hiển thị thông báo lỗi nếu không có idUnit được cung cấp
    echo "Lỗi: Không có đơn vị trắc nghiệm được cung cấp.";
}
?>