<?php
include 'db.php';

// لما يضغط "حفظ التعديلات"
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $id          = $_POST['item_id'];
    $name        = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $logo        = $_FILES['logo']['name'];

    if ($logo != "") {
        move_uploaded_file($_FILES['logo']['tmp_name'], "images/" . $logo);
        mysqli_query($conn, "UPDATE item SET name='$name', description='$description', logo='$logo' WHERE ID=$id");
    } else {
        mysqli_query($conn, "UPDATE item SET name='$name', description='$description' WHERE ID=$id");
    }

    header("Location: all_items.php");
    exit();
}

// لما يضغط "عرض البيانات للتعديل"
$selectedItem = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['view'])) {
    $id = $_POST['item_id'];
    $result = mysqli_query($conn, "SELECT * FROM item WHERE ID = $id");
    $selectedItem = mysqli_fetch_assoc($result);
}

// جلب كل العناصر للقائمة
$items = mysqli_query($conn, "SELECT * FROM item");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل عنصر - دليل البحر الأحمر</title>
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
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 15px;
        }
        textarea { height: 100px; resize: vertical; }
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
        }
        .btn-submit:hover { background-color: #0a9396; }
        .btn-view {
            background-color: #94d2bd;
            color: #005f73;
            border: none;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 15px;
        }
        .divider { height: 1px; background: #eee; margin: 20px 0; }
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
        <h1>تعديل عنصر</h1>
        <div class="form-container">

            <!-- فورم 1: اختيار العنصر -->
            <form method="POST">
                <div class="form-group">
                    <label>اختر العنصر المراد تعديله:</label>
                    <select name="item_id" required>
                        <option value="">-- اختر من القائمة --</option>
                        <?php while ($item = mysqli_fetch_assoc($items)): ?>
                            <option value="<?php echo $item['ID']; ?>"
                                <?php if ($selectedItem && $selectedItem['ID'] == $item['ID']) echo 'selected'; ?>>
                                <?php echo $item['name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" name="view" class="btn-view">عرض البيانات للتعديل</button>
            </form>

            <div class="divider"></div>

            <!-- فورم 2: تعديل البيانات -->
            <?php if ($selectedItem): ?>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="item_id" value="<?php echo $selectedItem['ID']; ?>">
                <div class="form-group">
                    <label>الاسم الجديد:</label>
                    <input type="text" name="name" value="<?php echo $selectedItem['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>الوصف الجديد:</label>
                    <textarea name="description" required><?php echo $selectedItem['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>شعار العنصر (Logo):</label>
                    <input type="file" name="logo">
                </div>
                <button type="submit" name="save" class="btn-submit">حفظ التعديلات</button>
            </form>
            <?php endif; ?>

        </div>
    </div>
</body>
</html>