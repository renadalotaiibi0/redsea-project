<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name       = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $categoryID = $_POST['categoryID'];
    $logo       = $_FILES['logo']['name'];

    // رفع الصورة
    if ($logo != "") {
        move_uploaded_file($_FILES['logo']['tmp_name'], "images/" . $logo);
    } else {
        $logo = "default.jpg";
    }

    // حفظ في قاعدة البيانات
    mysqli_query($conn, "INSERT INTO item (name, logo, description, categoryID) VALUES ('$name', '$logo', '$description', '$categoryID')");

    // روح لصفحة الوجهات
    header("Location: all_items.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة عنصر جديد - دليل البحر الأحمر</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            background: white;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            text-align: right;
        }
        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #005f73;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 15px;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #005f73;
        }
        input[type="file"] {
            padding: 8px;
            background: #f8f9fa;
        }
        textarea { height: 120px; resize: vertical; }
        .btn-submit {
            background-color: #005f73;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-submit:hover { background-color: #0a9396; }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <img src="images/logo.png" alt="Red Sea Logo">
            <a href="index.php">الرئيسية</a>
            <a href="all_items.php">الوجهات السياحية</a>
            <a href="about.html">من نحن</a>
            <a href="admin_login.php">لوحة التحكم</a>
        </div>
    </nav>
    <div class="container">
        <h1>إضافة عنصر جديد (Add Item)</h1>
        <div class="form-container">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>اسم العنصر:</label>
                    <input type="text" name="name" placeholder="أدخل اسم المعلم السياحي" required>
                </div>
                <div class="form-group">
                    <label>وصف العنصر:</label>
                    <textarea name="description" placeholder="اكتب وصفاً تفصيلياً للمكان..." required></textarea>
                </div>
                <div class="form-group">
                    <label>الفئة (Category):</label>
                    <select name="categoryID" required>
                        <option value="">-- اختر الفئة --</option>
                        <option value="1">جزيرة أمالا</option>
                        <option value="2">مشروع البحر الأحمر</option>
                        <option value="3">جزيرة سندالة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>شعار العنصر (Logo):</label>
                    <input type="file" name="logo">
                </div>
                <button type="submit" class="btn-submit">إضافة الآن</button>
            </form>
        </div>
    </div>
</body>
</html>