<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<style>
  /* Nền trang */
body {
    background-color: #f1f3f5; /* Nền màu nhạt dịu mắt */
    font-family: 'Arial', sans-serif; /* Font chữ phổ biến */
    margin: 0;
    padding: 0;
}

/* Container */
.container {
    max-width: 600px;
    margin: 100px auto; /* Căn giữa dọc và ngang */
    padding: 30px;
    background-color: #ffffff; /* Nền trắng cho khối */
    border-radius: 10px; /* Bo góc */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng nhẹ */
    text-align: center; /* Căn giữa nội dung */
}

/* Tiêu đề */
h2 {
    font-size: 2rem;
    font-weight: bold;
    color: #28a745; /* Màu xanh lá đậm, biểu tượng thành công */
    margin-bottom: 20px;
}

/* Đoạn văn */
p {
    font-size: 1rem;
    color: #6c757d; /* Màu chữ nhạt */
    margin-bottom: 15px;
}

/* Link quay lại */
a {
    color: #007bff; /* Màu xanh dương đặc trưng */
    text-decoration: none; /* Xóa gạch chân */
    font-weight: bold;
    transition: color 0.3s ease-in-out; /* Hiệu ứng hover */
}

a:hover {
    color: #0056b3; /* Đổi màu khi hover */
}

/* Đáp ứng (Responsive) */
@media (max-width: 768px) {
    .container {
        margin: 50px 20px; /* Giảm khoảng cách trên màn hình nhỏ */
        padding: 20px;
    }

    h2 {
        font-size: 1.8rem; /* Giảm kích thước chữ */
    }

    p {
        font-size: 0.9rem;
    }
}

</style>
<div class="container mt-5">
  <h2>Đặt hàng thành công</h2>
   <p>
    Quay lại trang chủ <a href="<?=ROOT_URL  ?>">Trang chủ</a>
   </p>
</div>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>