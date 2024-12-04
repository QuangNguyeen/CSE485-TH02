<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Layout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        /* Reset cơ bản */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 10px;
        }

        /* Header */
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        .header-content .btn {
            background: white;
            color: #007bff;
            border: none;
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .header-content .logout {
            background-color: #dc3545;
            color: white;
        }

        .header-content .btn:hover {
            opacity: 0.8;
        }

        /* Banner */
        .banner .banner-content {
            width: 100%;
            height: 200px;
            background: #ddd;
            margin-bottom: 20px;
        }

        /* Grid News */
        .grid-news {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .grid-news .news-item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
        }

        .grid-news .news-item .image {
            background: #ddd;
            height: 100px;
            background-size: cover;
            background-position: center;
        }

        .grid-news .news-item p {
            padding: 10px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>

<body>

    <?php
    require_once "../../models/News.php"; // Đảm bảo đường dẫn chính xác tới model News
    
    // Khởi tạo đối tượng News
    $newsModel = new News();
    $news = $newsModel->getAll(); // Lấy danh sách tin tức
    ?>

    <header class="header">
        <div class="header-content d-flex justify-content-between">
            <div class="left d-flex align-items-center ">
                <div class="icon mr-2">N1</div>
                <div> Trời lạnh do thiếu em (0 độ)</div>
            </div>
            <div>
                <button class="btn">Thông tin</button>
                <button class="btn logout">Log Out</button>
            </div>
        </div>
    </header>

    <section class="banner">
        <div class="banner-content"></div>
    </section>

    <section class="grid-news">
        <?php if (!empty($news)): ?>
            <?php foreach ($news as $item): ?>
                <a href="../news/detail.php?id=<?= htmlspecialchars($item['id']) ?>" style="text-decoration: none; color: inherit;">

                    <div class="news-item small">
                        <div class="image"
                            style="background-image: url('../../uploads/<?= htmlspecialchars(basename($item['image'])) ?>');">
                        </div>
                        <p>


                            <?= htmlspecialchars($item['title']) ?>

                        </p>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="news-item small">
                <p>Không có tin tức nào.</p>
            </div>
        <?php endif; ?>
    </section>

</body>

</html>