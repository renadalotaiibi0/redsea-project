<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الوجهات السياحية - دليل البحر الأحمر</title>
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
        .items-grid {
            max-width: 900px;
            margin: 0 auto 50px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }
        .item-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.07);
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s, box-shadow 0.3s;
            display: block;
        }
        .item-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 35px rgba(0,95,115,0.15);
        }
        .item-card img { width: 100%; height: 180px; object-fit: cover; }
        .item-card-body { padding: 18px 20px; }
        .item-card-body h3 { margin: 0 0 8px 0; color: #005f73; font-size: 18px; }
        .item-card-body p  { margin: 0; color: #555; font-size: 14px; line-height: 1.6; }
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
    <!--image source: https://www.visitredsea.com/ar/destinations/the-red-sea -->
    <img src="images/explor.png" alt="الوجهات السياحية">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1>الوجهات السياحية</h1>
        <p>اكتشف أبرز المرافق والوجهات السياحية على ساحل البحر الأحمر</p>
    </div>
</div>

<div class="container">
    <h2 class="section-title">🌊 جميع الوجهات</h2>
    <div class="items-grid">
        <?php
        $items = mysqli_query($conn, "SELECT * FROM item");
        while ($item = mysqli_fetch_assoc($items)) {
            $itemID = $item['ID'];
            $name   = $item['name'];
            $logo   = $item['logo'];
            $desc   = $item['description'];
            echo "
            <a href='item_profile.php?id=$itemID' class='item-card'>
                <img src='images/$logo' alt='$name'>
                <div class='item-card-body'>
                    <h3>$name</h3>
                    <p>$desc</p>
                </div>
            </a>";
        }
        ?>
    </div>
</div>
</body>
</html>