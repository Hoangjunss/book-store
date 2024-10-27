<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/98df298cac.js" crossorigin="anonymous"></script>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }

        .form-group {
            text-align: center;
        }

        .form-group a {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="login-form">
    <form action="/login" method="post" id="myForm">
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="password" required="required">
            <small id="passwordError" style="color: red;"></small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox">Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>
    </form>
    <div class="form-group">
        <div>--or--</div>
        <a href="/oauth2/authorization/google"><i class="fa fa-google-plus" style="color: red; font-size: 35px; margin-top: 20px"></i></a>
    </div>
    <p class="text-center"><a href="register.php">Create an Account</a></p>
</div>
<script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
        var passwordInput = document.getElementById('password');
        var passwordError = document.getElementById('passwordError');
        var password = passwordInput.value;
        if (password.length < 6) {
            event.preventDefault();
            passwordError.textContent = 'Mật khẩu phải có ít nhất 6 kí tự.';
        } else {
            passwordError.textContent = '';
        }
    });

    function isValidPassword(password) {
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
        return passwordRegex.test(password);
    }

    // Đoạn mã kiểm tra số điện thoại không được sử dụng trong form này nên có thể loại bỏ
</script>
</body>
</html>
