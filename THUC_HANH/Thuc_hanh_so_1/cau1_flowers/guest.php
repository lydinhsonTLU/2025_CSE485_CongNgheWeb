<?php
    require_once "../ConnectDb.php";
    
    $db = new Database() ;
    $manager = new Manager($db);
    
    $flowers = $manager->getAllFlowers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <title>Danh sách hoa</title>

    <style>
        .h2tieude {
            color: brown;
            margin-top: 20px;
            margin-left: 25px;
            margin-bottom: 35px;
        }

        .spantieude {
            height: auto;
            color: brown;
            background-color: brown;
            margin-right: 15px;
        ;
            border-radius: 5px;
        }

        .row-cols-3 {
            margin-left: 20px;
            margin-right: 20px;
        }
        button {
            padding: 12px 24px;
            margin: 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
        }

    </style>
</head>
<body>
<!-- tiêu đề -->
<div>
    <button onclick="window.location.href='index.php'">Quay lại</button>
</div>

<!-- tạo 1 row chia thành 3 cột -->
<div class="row row-cols-3" style="margin-top: 20px;">
        <?php foreach ($flowers as $item): ?>
            <div class="col">
                <div class="card">
                    <img
                        src="<?= htmlspecialchars($item['anh']) ?>"
                        alt="<?= htmlspecialchars($item['ten_hoa']) ?>"
                        class="card-img-top"
                    >

                    <div class="card-body">
                        <div class="card-title"><h5><b><?= htmlspecialchars($item['ten_hoa'])?></b></h5></div>

                        <div class="card-text">
                            <?= htmlspecialchars($item['mo_ta'])?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
</div>


</body>
</html>