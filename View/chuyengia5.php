<style>
  .teacher-info {
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
  }

  .teacher-photo {
    width: 100px;
    height: 100px;
    background-color: #ddd;
    border-radius: 50%;
    margin-bottom: 20px;
  }

  .teacher-details {
    margin-bottom: 10px;
  }

  .teacher-details strong {
    color: #333;
  }

  .ask-button {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    text-transform: uppercase;
    font-weight: bold;
  }

  .ask-button:hover {
    background-color: #0056b3;
  }
</style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="teacher-info text-center">
          <div class="teacher-photo">
            <img class="teacher-photo" src="img/testimonial-1" alt="" width="300px" height="300px">
          </div>

          <div class="teacher-details">
            <strong>Họ và tên:</strong> Phạm Văn Nam
          </div>
          <div class="teacher-details">
            <strong>Ngày sinh:</strong> 03/11/1982
          </div>
          <p>Chào bạn, tôi là Phạm Văn Nam, một giáo viên dạy học cho học sinh trung học có khuyết tật thính giác.
            Với hơn 12 năm kinh nghiệm trong ngành giáo dục đặc biệt, tôi đã nhận thấy rằng đam mê của mình là giúp các em trẻ khám phá khả năng bên trong mình và vượt qua mọi thách thức.
            Tôi tin rằng mỗi học sinh đều có thể học tốt nếu được đồng hành và hỗ trợ chính xác, và tôi cam kết làm việc chăm chỉ để đảm bảo sự phát triển toàn diện cho mỗi em.</p>
          <!-- Form câu hỏi -->
          <button class="btn btn-primary" onclick="showQuestionForm('teacher1')">Đặt câu hỏi</button>

          <form class="question-form mt-3" id="teacher1Form" style="display:none; text-align: left;">
            <div class="form-group">
              <label for="loginHoTen">Họ và tên</label>
              <input type="hoTen" class="form-control" name="hoTen" id="loginHoTen" placeholder="Họ và tên">
            </div>
            <div class="form-group">
              <label for="loginSDT">Số điện thoại</label>
              <input type="sdt" class="form-control" name="sdt" id="loginSDT" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
              <label for="loginEmail">Email</label>
              <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="question1">Câu hỏi của bạn</label>
              <textarea class="form-control" id="question1" rows="3" required></textarea>
            </div </form>
            <button type="button" class="btn btn-success" onclick="sendQuestion('teacher1')">Gửi câu hỏi</button>
        </div>
      </div>
    </div>

  </div>
  <!-- Link Bootstrap JS và Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function showQuestionForm(teacherId) {
      // Ẩn tất cả các form câu hỏi, form trả lời và form phản hồi
      $(".question-form").hide();
      // Hiển thị form câu hỏi của giáo viên được chọn
      $("#" + teacherId + "Form").show();
    }

    function sendQuestion(teacherId) {
      // Lấy nội dung câu hỏi
      var question = $("#" + teacherId + "Form textarea").val();
      // Hiển thị câu hỏi ở form trả lời
      $("#" + teacherId + "ReplyForm textarea").val(question);
      // Hiển thị form trả lời
      $("#" + teacherId + "ReplyForm").show();
      // Ẩn form câu hỏi
      $("#" + teacherId + "Form").hide();
    }

    function showFeedbackForm(teacherId) {
      // Lấy nội dung trả lời của giáo viên
      var reply = $("#" + teacherId + "ReplyForm textarea").val();
      // Hiển thị trả lời ở form phản hồi
      $("#" + teacherId + "FeedbackForm textarea").val(reply);
      // Hiển thị form phản hồi
      $("#" + teacherId + "FeedbackForm").show();
      // Ẩn form trả lời
      $("#" + teacherId + "ReplyForm").hide();
    }
  </script>

</body>