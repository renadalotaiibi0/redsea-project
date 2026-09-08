<?php
include 'db.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) == 1) {
      

        header("Location: admin_panel.html");
        exit();
    } else {
     

        $error = "اسم المستخدم أو كلمة المرور غير صحيحة!";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول - دليل البحر الأحمر</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-wrapper {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            border-radius: 10px;
            padding: 45px 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            border-top: 4px solid #005f73;
        }
        .login-title {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-title h1 {
            color: #005f73;
            font-size: 22px;
            margin: 0 0 6px 0;
        }
        .login-title p {
            color: #999;
            font-size: 14px;
            margin: 0;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 15px;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #005f73;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #005f73;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 5px;
        }
        .btn-login:hover { background-color: #0a9396; }
        .error-msg {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            color: #c53030;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #888;
            font-size: 13px;
            text-decoration: none;
        }
        .back-link:hover { color: #005f73; }
    </style>
</head>
<body>
<nav><nav>
    <div class="nav-container">
        <img src="images/logo.png" alt="Red Sea Logo">
        <a href="index.php">الرئيسية</a>
        <a href="all_items.php">الوجهات السياحية</a>
        <a href="about.html">من نحن</a>
        <a href="admin_login.php">لوحة التحكم</a>
    </div>
</nav>

<div class="container">
    <div class="login-wrapper">
        <div class="login-box">

            <div class="login-title">
                <h1>تسجيل دخول</h1>
                <p>مشروع البحر الأحمر</p>
            </div>

            <?php if ($error != ""): ?>
                <div class="error-msg"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>اسم المستخدم</label>
                    <input type="text" name="username" placeholder="أدخل اسم المستخدم" required>
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" placeholder="أدخل كلمة المرور" required>
                </div>
                <button type="submit" class="btn-login">تسجيل الدخول</button>
            </form>

            <a href="index.php" class="back-link">← العودة للرئيسية</a>
        </div>
    </div>
</div>
</body>
</html>