<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <div class="row">
        <!-- Hình ảnh sản phẩm -->
        <div class="col-md-6">
            <img src="<?= 'images/' . $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid rounded">
        </div>
        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="display-5"><?= $product['name'] ?></h1>
            <p class="text-muted">Trạng thái:
                <span class="badge bg-success">
                    <?= $product['quantity'] ? 'Còn hàng' : 'Hết hàng' ?>
                </span>
            </p>
            <h3 class="text-danger">Giá: <?= number_format($product['price']) ?> VNĐ</h3>
            <p><strong>Số lượng còn:</strong> <?= $product['quantity'] ?></p>
            <p class="mt-4">
                <strong>Mô tả sản phẩm:</strong><br>
                <?= $product['description'] ?>
            </p>
            <div class="mt-4">
                <a href="<?=ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>" class="btn btn-primary btn-lg">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <h2>Mô tả chi tiết</h2>
            <p>
            "Thiết kế tinh tế, chất liệu cao cấp, tôn vinh phong cách thời thượng."
            </p>
        </div>
    </div>

    <!-- Phần bình luận -->
    <div class="row mt-5">
        <div class="col">
            <h2>Bình luận</h2>
            <!-- Form bình luận -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên của bạn:</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên của bạn" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Bình luận:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3" placeholder="Nhập bình luận của bạn" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>

            <!-- Danh sách bình luận -->
            <ul class="list-group mt-4">
                <?php
                // Giả lập mảng bình luận (sau này thay bằng database)
                $comments = [
                  
                ];

                // Xử lý thêm bình luận nếu form được submit
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username']) && !empty($_POST['comment'])) {
                    $newComment = [
                        "username" => htmlspecialchars($_POST['username']),
                        "comment" => htmlspecialchars($_POST['comment']),
                    ];
                    array_push($comments, $newComment);
                }

                // Hiển thị tất cả bình luận
                foreach ($comments as $cmt) {
                    echo "<li class='list-group-item'><strong>{$cmt['username']}:</strong> {$cmt['comment']}</li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <h3 class="mb-4">Sản phẩm liên quan</h3>
    <div class="row">
      <!-- Sản phẩm 1 -->
      <div class="col-md-3">
        <div class="card">
          <img src="images/img/anhnu1.webp" class="card-img-top rounded" alt="Sản phẩm 1">
          <div class="card-body text-center">
            <h6 class="card-title">Sản phẩm 1</h6>
            <p class="text-danger mb-2">1,200,000 VND</p>
            <a href="product-detail1.html" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
          </div>
        </div>
      </div>
      <!-- Sản phẩm 2 -->
      <div class="col-md-3">
        <div class="card">
          <img src="images/img/anhnu2.webp" class="card-img-top rounded" alt="Sản phẩm 2">
          <div class="card-body text-center">
            <h6 class="card-title">Sản phẩm 2</h6>
            <p class="text-danger mb-2">900,000 VND</p>
            <a href="product-detail2.html" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
          </div>
        </div>
      </div>
      <!-- Sản phẩm 3 -->
      <div class="col-md-3">
        <div class="card">
          <img src="images/img/anhnu8.webp" class="card-img-top rounded" alt="Sản phẩm 3">
          <div class="card-body text-center">
            <h6 class="card-title">Sản phẩm 3</h6>
            <p class="text-danger mb-2">1,000,000 VND</p>
            <a href="product-detail3.html" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
          </div>
        </div>
      </div>
      <!-- Sản phẩm 4 -->
      <div class="col-md-3">
        <div class="card">
          <img src="images/img/anhnu4.webp" class="card-img-top rounded" alt="Sản phẩm 4">
          <div class="card-body text-center">
            <h6 class="card-title">Sản phẩm 4</h6>
            <p class="text-danger mb-2">800,000 VND</p>
            <a href="product-detail4.html" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
