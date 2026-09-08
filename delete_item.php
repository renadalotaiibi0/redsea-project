<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['item_id'];
    mysqli_query($conn, "DELETE FROM item WHERE ID = $id");
    header("Location: all_items.php");
    exit();
}

// جلب كل العناصر
$items = mysqli_query($conn, "SELECT * FROM item");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف عنصر - دليل البحر الأحمر</title>
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
        .form-group { margin-bottom: 25px; }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #005f73;
        }
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-family: inherit;
            background-color: #fdfdfd;
            font-size: 15px;
        }
        .warning-box {
            background-color: #fff5f5;
            border: 1px solid #feb2b2;
            color: #c53030;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .btn-delete {
            background-color: #e76f51;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-delete:hover {
            background-color: #cf5d42;
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <img src="images/logo.png" alt="Logo">
            <a href="index.php">الرئيسية</a>
            <a href="all_items.php">الوجهات السياحية</a>
            <a href="about.html">من نحن</a>
            <a href="admin_login.php">لوحة التحكم</a>
        </div>
    </nav>
    <div class="container">
        <h1>حذف عنصر (Delete Item)</h1>
        <div class="form-container">
            <div class="warning-box">
                <strong>تنبيه:</strong> الحذف نهائي ولا يمكن التراجع عنه بعد إتمام العملية.
            </div>
            <form method="POST">
                <div class="form-group">
                    <label>اختر العنصر المراد حذفه:</label>
                    <select name="item_id" required>
                        <option value="">-- اختر من القائمة --</option>
                        <?php while ($item = mysqli_fetch_assoc($items)): ?>
                            <option value="<?php echo $item['ID']; ?>">
                                <?php echo $item['name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" class="btn-delete">حذف العنصر الآن</button>
            </form>
        </div>
    </div>
</body>
</html>