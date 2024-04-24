
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
            <img class="teacher-photo" src="img/team-1.jpg" alt="" width="300px" height="300px">
          </div>

          <div class="teacher-details">
            <strong>Họ và tên:</strong> Lê Thị Hòa
          </div>
          <div class="teacher-details">
            <strong>Ngày sinh:</strong> 10/05/1990
          </div>
          <p>Xin chào, tôi là Lê Thị Hòa, một giáo viên dạy học cho trẻ khuyết tật từ mẫu giáo đến cấp 1. 
            Tôi đã hoạt động trong lĩnh vực này trong suốt 8 năm qua và đã có cơ hội làm việc với nhiều học sinh có nhu cầu đặc biệt khác nhau. 
            Tôi tin rằng mỗi trẻ em đều có quyền được giáo dục chất lượng 
            và tôi sẽ luôn nỗ lực để xây dựng môi trường học tập đa dạng và thân thiện, giúp các em phát triển tối đa tiềm năng của bản thân.</p>
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

