<style>
    body {
        font-family: 'Arial', sans-serif;
        background: url(../kindergarten-website-template/img/login.jpg);
    }

    .register-container {
        max-width: 400px;
        margin: 100px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000000;
    }

    .header-text {
        margin-bottom: 30px;
        color: #333333;
        text-align: center;
    }

    .custom-btn {
        background-color: #f8b400;
        color: white;
        border: none;
    }

    .custom-btn:hover {
        background-color: #e5a300;
    }

    .form-link {
        color: #333333;
        text-align: center;
        display: block;
        margin-top: 15px;
    }
</style>
</head>

<body>

    <div class="register-container">
        <h2 class="header-text">Đăng ký tài khoản</h2>
        <form>
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
                <label for="loginUsername">Tên đăng nhập</label>
                <input type="username" class="form-control" name="username" id="loginUsername" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <label for="registerPassword">Mật khẩu</label>
                <input type="password" class="form-control" id="registerPassword" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder=" Nhập lại mật khẩu">
            </div>
            <button type="submit" class="btn custom-btn btn-block">
                <a href="" style="text-decoration: none;">Đăng ký</a>
            </button>
            <a href="index.php?login" class="form-link">Bạn đã có tài khoản? Đăng nhập</a>
        </form>
    </div>


</body>