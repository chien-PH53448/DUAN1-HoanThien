<?php
class ProductController {
    // Hiển thị danh sách sản phẩm theo danh mục
    public function list() {
        // Lấy id danh mục từ tham số GET
        $id = $_GET['id'] ?? null; // Thêm kiểm tra null để tránh lỗi nếu không có id

        // Kiểm tra nếu id hợp lệ
        if ($id) {
            // Lấy sản phẩm theo danh mục
            $products = (new Product)->listProductInCategory($id);
            // Lấy ra tên của danh mục
            $category = (new Category)->show($id);
            $title = $category['cate_name'] ?? 'Danh mục không xác định';

            // Lấy ra danh sách tất cả các danh mục
            $categories = (new Category)->list();

            // Hiển thị danh sách sản phẩm
            return view(
                'clients.products.list',
                compact('products', 'title', 'categories')
            );
        } else {
            // Xử lý trường hợp không có id
            return view('404.404'); // Chuyển đến trang lỗi 404
        }
    }

    // Hiển thị chi tiết sản phẩm
    public function show() {
        $id = $_GET['id'] ?? null; // Thêm kiểm tra null để tránh lỗi nếu không có id

        // Kiểm tra nếu id hợp lệ
        if ($id) {
            $product = (new Product)->find($id);

            // Kiểm tra xem sản phẩm có tồn tại không
            if ($product) {
                $title = $product['name'] ?? 'Sản phẩm không xác định';
                $categories = (new Category)->list();
                // lưu lại đường dẫn vào sesion
                $_SESSION['URI']= $_SERVER['REQUEST_URI'];
                return view(
                    'clients.products.detail',
                    compact('product', 'categories', 'title') // Tiêu đề web
                );
            } else {
                // Xử lý trường hợp không tìm thấy sản phẩm
                return view('404.404'); // Chuyển đến trang lỗi 404
            }
        } else {
            // Xử lý trường hợp không có id
            return view('404.404'); // Chuyển đến trang lỗi 404
        }
    }
    
}
?>