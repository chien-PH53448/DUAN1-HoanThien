<?php include_once ROOT_DIR . "views/clients/header.php" ?>


<body>
    <div class="container mt-5">
    <center>   <h1 class="mb-4">Giỏ hàng của bạn</h1></center> 
        <form action="<?= ROOT_URL  . '?ctl=update-cart' ?>" method="POST">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dòng sản phẩm 1 -->
                         <?php foreach($carts as $id => $cart) : ?>
                        <tr>
                            <th scope="row"><?=$id?></th>
                            <td>
                                <img src="<?= "./images/".$cart['image']?>" alt="Tên sản phẩm 1" class="img-thumbnail"
                                    style="width: 80px; height: auto;">
                            </td>
                            <td><?= $cart['name']?></td>
                            <td><?= number_format($cart['price']) ?>VND</td>
                            <td>
                                <input type="number" name="quantity[<?=$id?>]" class="form-control" value="<?= $cart['quantity'] ?>" min="1"
                                    style="width: 80px;">
                            </td>
                            <td><?= number_format($cart['price'] * $cart['quantity']) ?> VNĐ</td>
                            <td>
                                <a href="<?= ROOT_URL . '?ctl=delete-cart&id=' . $id ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                         </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <!-- Tổng tiền -->
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                            <td colspan="2" class="fw-bold text-danger"><?= number_format($totalPriceOrder) ?> VNĐ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Nút hành động -->
            <div class="d-flex justify-content-between mt-4">
                <a href="<?= ROOT_URL ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
                </a>
                <div>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-arrow-clockwise"></i> Cập nhật giỏ hàng
                    </button>
                    <a href="<?= ROOT_URL . '?ctl=view-checkout' ?>" class="btn btn-success">
                        <i class="bi bi-credit-card"></i> Thanh toán
                         </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>


<!--  -->