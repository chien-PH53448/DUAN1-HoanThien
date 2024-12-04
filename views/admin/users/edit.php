
<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="container">
                    <h2>Đăng ký</h2>
                    <form action="<?= ADMIN_URL. '?ctl=updateuser'?>" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
                        </div>
                 
                  
              
                        <p>Bạn đã có tài khoản?<a href="<?= ROOT_URL . '?ctl=login'?>">Đăng nhập</a></p>
                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
