<?php
class CartController
{
    // thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {

        // unset( $_SESSION['cart']);

        // lấy giỏ hàng nếu có, còn ko thì tạo giỏ hàng mới
        $carts = $_SESSION['cart'] ?? [];
        // lấy id sản phẩm muốn thêm vào giỏ hàng
        $id = $_GET['id'];
        // tìm sp theo id
        $product = (new Product)->find($id);

        //Nhặt hàng vào giỏ
        // nếu hàng tồn tại trong giỏ
        if (isset($carts[$id])) {
            // tăng số lượng lên 1
            $carts[$id]['quantity'] += 1;
        } else {
            // đưa sp vào giỏ
            $carts[$id] = [
                'name' => $product['name'],
                'image' => $product['image'],
                'price' => $product['price'],
                'quantity' => 1,
            ];
        }
        // lây// lấy tổng số lượng giỏ hàng lưu vào sessioon
        $_SESSION['totalQuantity'] = $this->totalSumQuantity($carts);
        // Gán lại giỏ hàng cho session
        $_SESSION['cart'] = $carts;
        $uri = $_SESSION['URI']; // thong tin của đường dẫn trước đó
        // di chuyển website về trang cũ
        return header("Location:" . $uri);
    }

    // tính năng số luownh=gj sp trong giỏ hàng
    public function totalSumquantity($carts)
    {

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'];
        }
        return $total;
    }

    // tính tổng tiền của đơn hàng
    public function totalPriceOrder()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['price'] * $cart['quantity'];
        }
        return $total;
    }

    // View của giỏ hàng 
    public function viewCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceOrder = $this->totalPriceOrder();
        return view('clients.carts.cart', compact('carts', 'totalPriceOrder'));
    }

    // xoá sp trong giỏ hàng
    public function deleteProductIncart()
    {

        // lấy id 
        $id = $_GET['id'];
        // xoá sp trong giỏ hàng 
        unset($_SESSION['cart'][$id]);

        // lây// lấy tổng số lượng giỏ hàng lưu vào sessioon
        $_SESSION['totalQuantity'] = $this->totalSumQuantity($_SESSION['cart']);
        // quay lại giỏ hàng
        return header("location: " . ROOT_URL . '?ctl=view-cart');
    }
    public function updateCart()
    {
        $quantities = $_POST['quantity'];
        // cập nhật số lượng
        foreach ($quantities as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
        // lây// lấy tổng số lượng giỏ hàng lưu vào sessioon
        $_SESSION['totalQuantity'] = $this->totalSumQuantity($_SESSION['cart']);
        return header("location: " . ROOT_URL . '?ctl=view-cart');
    }
    
    public function ViewCheckOut(){
        // kiểm tra xem người dùng đăng nhập chưa, nếu chưa thì vào login
        if(!isset($_SESSION['user'])){
            return header("location: " . ROOT_URL . '?ctl=login');
        }
        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceOrder = $this->totalPriceOrder();
        return view("clients.carts.checkout", compact('user','carts','totalPriceOrder'));
    }

    // thanh toan
    public function checkOut(){
        // lấy thông tin của người dùng
     $user=[
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'sdt' => $_POST['sdt'],
        'diachi' => $_POST['diachi'],
        'role'  => $_SESSION['user'] ['role'],
        'active'  => $_SESSION['user'] ['active'],
     ];
     $totalPriceOrder = $this->totalPriceOrder();
    //  lay thong tin thanh toan
   dd($user);
     $order =[
        'user_id' => $_POST['id'],
        'status'  => 1,
         'payment' => $_POST['payment'],
         'total_price' => $totalPriceOrder,
     ];
   
     (new User)->update($user['id'], $user);
     $order_id = ( new Order)->create($order);

     $carts =$_SESSION['cart'];
     foreach ($carts as $id => $cart){
        $or_detail =[
            'order_id' => $order_id,
            'product_id' => $id,
            'price' => $cart['price'],
            'quantity' => $cart['quantity'],
        ];
        (new Order)->createOrderDetail($or_detail);
     }
     $this->cleaerCart(); // xoa thong tin gio hang
 return header("Location: " . ROOT_URL . "?ctl=success");
    }

    // xoá giỏ hàng
    public function cleaerCart(){
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);
    }

    public function success(){
        return view("clients.carts.success");
    }
}
