<?php


// Kiểm tra xem có lưu tên người dùng không
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3CiBi - <?= $title ?? '' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/common.css">
    <style>
        .box {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .box img {
            width: 100%;
            /* Đảm bảo hình ảnh chiếm 100% chiều rộng của box */
            height: auto;
            /* Giữ tỉ lệ khung hình */
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
            border-radius: 15px;
            /* Bo góc cho footer */
            margin-top: 40px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            /* Bỏ gạch chân */
        }

        .footer a:hover {
            text-decoration: underline;
            /* Gạch chân khi hover */
        }

        .footer .social-icons a {
            margin: 0 10px;
            /* Khoảng cách giữa các icon */
        }

        .product-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #333;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-price {
            font-size: 0.85rem;
            font-weight: 500;
            color: #d9534f;
        }

        .product-info {
            margin-top: 10px;
        }

        .custom-title {
            font-family: 'Playfair Display', serif;
            /* Kiểu chữ sang trọng */
            font-size: 1.5rem;
            /* Kích thước lớn hơn */
            font-weight: bold;
            color: #333;
            /* Màu chữ tối */
            text-transform: uppercase;
            /* Chữ in hoa */
            letter-spacing: 1px;
            /* Khoảng cách giữa các chữ */
            margin-bottom: 15px;
            text-align: center;
            /* Canh giữa tiêu đề */
        }

        .custom-title span {
            color: #d9534f;
            /* Tạo điểm nhấn màu đỏ */
        }
    </style>
</head>

<body>
    <div class="container bg-light-subtle">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/img/logo1.png" width="40%" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= ROOT_URL ?>">Trang chủ</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sản Phẩm
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($categories as $cate): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                            <?= $cate['cate_name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <ul class="dropdown-menu">
                                <?php foreach ($categories as $cate): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                            <?= $cate['cate_name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?= ROOT_URL ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                                Tài khoản
                                <?= $_SESSION['user']['name'] ?? '' ?>
                            </a>
                           
                            <ul class="dropdown-menu">
                                <?php if (isset($_SESSION['user'])): ?>
                                    <li>
                                        <a href="<?= ROOT_URL ?>" class="dropdown-item">Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?= ROOT_URL . '?ctl=logout' ?>" class="dropdown-item">Logout</a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="<?= ROOT_URL . '?ctl=login' ?>" class="dropdown-item">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="<?= ROOT_URL . '?ctl=register' ?>" class="dropdown-item">Đăng ký</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>


                    </ul>
                    <form  class="d-flex" role="search">
                        <input class="form-control me-2" type="search" 
                        placeholder="Search" aria-label="Search" id="keyword">
                        <button class="btn btn-outline-success" type="button" id="btnSearch">Search</button>
                        <a href="<?= ROOT_URL . '?ctl=register' ?>"><span class="material-symbols-outlined mt-1">person</span></a>
                        <a href="<?= ROOT_URL . '?ctl=view-cart' ?>" class="position-relative text-decoration-none">
                            <span class="material-symbols-outlined" style="font-size: 1.8rem;">
                                shopping_cart
                            </span>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $_SESSION['totalQuantity'] ?? '0' ?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>

                    </form>

                </div>
            </div>
    </div>
    </nav>