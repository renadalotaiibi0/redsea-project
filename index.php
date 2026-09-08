<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل البحر الأحمر السياحي</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .hero {
            position: relative;
            width: 100%;
            height: 90vh;
            overflow: hidden;
        }
        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.1) 60%);
        }
        .hero-text {
            position: absolute;
            bottom: 80px;
            right: 60px;
            color: white;
            text-align: right;
        }
        .hero-text h1 {
            font-size: 52px;
            margin: 0 0 10px 0;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        .hero-text p {
            font-size: 18px;
            opacity: 0.9;
            margin: 0;
            text-shadow: 0 1px 5px rgba(0,0,0,0.5);
        }
        .section-title {
            text-align: center;
            color: #005f73;
            font-size: 28px;
            margin: 50px 0 30px 0;
        }
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

    <!-- Hero Section -->
    <div class="hero">
        <!--image source:https://www.visitredsea.com/ar/destinations/the-red-sea-->
        <img src="images/RedSeaProject.jpg" alt="مشروع البحر الأحمر">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1>وجهة البحر الأحمر</h1>
            <p>اكتشف أجمل الوجهات السياحية الفاخرة على ساحل البحر الأحمر</p>
        </div>
    </div>

    <div class="container">
        <h2 class="section-title">🌊 اختر وجهتك السياحية</h2>
        <div class="items-grid">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM category");
            while ($row = mysqli_fetch_assoc($result)) {
                $id   = $row['ID'];
                $name = $row['name'];
                $desc = $row['description'];

                if ($id == 1) $img = "amala.jpg";
                else if ($id == 2) $img = "red_sea.jpg";
                else $img = "sindalah.jpg";

                echo "
                <a href='category.php?id=$id' class='item-card'>
                    <img src='images/$img' alt='$name'>
                    <h3>$name</h3>
                    <p>$desc</p>
                </a>";
            }
            ?>
        </div>
    </div>
</body>
</html>