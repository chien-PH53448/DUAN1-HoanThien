<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <!-- Carousel Banner -->
    <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/img/1.png" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="images/img/2.png" class="d-block w-100" alt="Banner 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <h1 class="custom-title" style="margin: 20px;">Sản phẩm <span>Nam</span></h1>
    <div class="row g-4">
        <?php foreach ($pets as $pet): ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3 ">
                <div class="product-box bg-body-tertiary">
                    <a href="<?='?ctl=detail&id=' . $pet['id']?>"><img src="images/<?= $pet['image'] ?>" alt="Product Image" class="product-img"></a>
                    <div class="product-info">
                        <a href="<?= '?ctl=detail&id=' . $pet['id'] ?>" class="text-decoration-none">
                            <h5 class="product-name"><?= $pet['name'] ?></h5>
                        </a>
                        <div class="">
                            <?php
                            echo'<strong>Giá: ' . number_format($pet['price'], 0, ',', '.') . ' VNĐ</strong>';
                            ?>
                            <!-- <span class="product-price">Giá: <?= $pet['price'] ?></span> -->
                        </div>
                        <div class="product-buttons">
                            <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <h1 class="custom-title" style="margin: 20px;">Sản phẩm <span>Nữ</span></h1>
    <div class="row g-4">
        <?php foreach ($list_products as $pro) : ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3">
                <div class="product-box">
                    <a href="<?= '?ctl=detail&id=' . $pro['id'] ?>"><img width="300px" src="images/<?= $pro['image'] ?>" alt="Product Image" class="product-img"></a>
                    <div class="product-info">
                        <a href="<?= '?ctl=detail&id=' . $pro['id'] ?>" class="text-decoration-none">
                            <h5 class="product-name"><?= $pro['name'] ?></h5>
                        </a>
                        <div class="">
                        <?php
                            echo'<strong>Giá: ' . number_format($pro['price'], 0, ',', '.') . ' VNĐ</strong>';
                            ?>

                        </div>
                        <div class="product-buttons">

                            <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="container">
        <h2 class="mt-5">SALE</h2>
        <div class="row box">
            <div class="col-md-6">
                <img src="images/img/1.png" alt="Image 1" class="rounded">
            </div>
            <div class="col-md-6">
                <img src="images/img/2.png" alt="Image 2" class="rounded">
            </div>
        </div>
    </div>
    <h1 class="my-4 text-center">Sản phẩm mới</h1>
    <div class="row g-4">
        <?php foreach ($list_products as $pro) : ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3">
                <div class="product-box">
                    <a href="<?= '?ctl=detail&id=' . $pro['id'] ?>"><img width="300px" src="images/<?= $pro['image'] ?>" alt="Product Image" class="product-img"></a>
                    <div class="product-info">
                        <a href="<?= '?ctl=detail&id=' . $pro['id'] ?>" class="text-decoration-none text-center">
                            <h5 class="product-name"><?= $pro['name'] ?></h5>
                        </a>
                        <div class="text-center">
                        <?php
                            echo'<strong>Giá: ' . number_format($pro['price'], 0, ',', '.') . ' VNĐ</strong>';
                        ?>

                        </div>
                        <div class="product-buttons">

                            <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>