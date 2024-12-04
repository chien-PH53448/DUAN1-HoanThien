<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
<div class="mb-3 mt-3">
    <a href="<?=ROOT_URL ?>">Trang chủ</a> 
    <b><?= $title ?? '' ?></b>
</div>
<h2>Từ khoá tìm kiếm :<?= $keyword ?></h2>
    <div class="row g-4">
        <?php if($products) : ?>
        <?php foreach ($products as $pro) : ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3">
                <div class="product-box">
                    <img width="300px" src="images/<?= $pro['image'] ?>" alt="Product Image" class="product-img">
                    <div class="product-info">
                        <a href="<?= ROOT_URL .'?ctl=detail&id=' .$pro['id'] ?>" class="text-decoration-none">
                            <h5 class="product-name text-center "><?= $pro['name'] ?></h5>
                        </a>
                        <div class="text-center">
                            <span class="product-price"><?= $pro['price'] ?> VNĐ</span>

                        </div>
                        <div class="product-buttons">
                            <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php else : ?>
            <div>Không tìm thấy sản phẩm nào : <b><?= $keyword ?></b></div>
            <?php endif ?>

    </div>
</div>

<?php include_once ROOT_DIR . "views/clients/header.php" ?>
