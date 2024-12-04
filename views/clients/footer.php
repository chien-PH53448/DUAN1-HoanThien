<footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Về Chúng Tôi</h5>
                    <p>Chúng tôi cung cấp các sản phẩm và dịch vụ chất lượng cao nhất cho khách hàng.</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên Kết</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Trang Chủ</a></li>
                        <li><a href="#">Giới Thiệu</a></li>
                        <li><a href="#">Dịch Vụ</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Liên Hệ</h5>
                    <p>Email: contact@example.com</p>
                    <p>Điện Thoại: +84 123 456 789</p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; 2024 Công Ty của Chúng Tôi. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script>
        $btnSearch = document.getElementById('btnSearch')
        keyword = document.getElementById('keyword');

        $btnSearch.addEventListener('click', function(){
    location.href ="<?= ROOT_URL . '?ctl=search&keyword=' ?>" + keyword.value;
        });
    </script>