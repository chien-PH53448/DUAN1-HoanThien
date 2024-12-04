<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="container">
                    <h2>Đăng ký</h2>
                    <form action="<?= ROOT_URL . '?ctl=register'?>" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập họ tên">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="mb-3">
                            <label for="sdt" class="form-label">Điện thoại</label>
                            <input type="text" class="form-control" name="sdt" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="diachi" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ">
                        </div>
                        <p>Bạn đã có tài khoản?<a href="<?= ROOT_URL . '?ctl=login'?>">Đăng nhập</a></p>
                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>