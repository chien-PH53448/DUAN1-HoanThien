<?php
class Order extends BaseModel{
    public
    $status_details = [
        1 => 'chờ xử lý',
        2 => 'đang xử lý',
        3 => 'Hoàn thành',
        4 => 'Đã huỷ',
       ];
    // tat ca hoa don
    public function all(){
        $sql = "SELECT o.*, name , email, diachi, sdt FROM orders o JOIN taikhoan 
        u ON o.user_id= u.id ORDER BY o.id DESC";
        $stsm = $this->conn->prepare($sql);
        $stsm->execute();
        return $stsm->fetchAll(PDO::FETCH_ASSOC);
    }
    // CHI TIET HOA DON
    public function find($id){
     $sql = "SELECT o.*, name, email, diachi, sdt
      FROM orders o JOIN taikhoan u ON o.user_id=u.id 
      
      WHERE o.id=:id";
     $stsm = $this->conn->prepare($sql);
     $stsm->execute(['id'=>$id]);
     return $stsm->fetch(PDO::FETCH_ASSOC);
    }


    // danh sách sp hoá đơn
    public function listOrderDetail($id){
        $sql = "SELECT od.*, name, image
        FROM  order_details od JOIN products p
        ON od.product_id = p.id
        WHERE od.order_id=:id";
         $stsm = $this->conn->prepare($sql);
         $stsm->execute(['id'=>$id]);
          return $stsm->fetchAll(PDO::FETCH_ASSOC);
    }

    // them hoa don
    public function create($data){
    $sql = "INSERT INTO  orders(user_id, status, payment, total_price)
    VALUES(:user_id, :status, :payment, :total_price )";
     $stsm = $this->conn->prepare($sql);
     $stsm->execute($data);
     return $this->conn->lastInsertId();
    }

    // cap nhat trang thai
    public function updateStatus($id, $status){
        $sql = "UPDATE orders SET status=:status WHERE id=:id";
        $stsm = $this->conn->prepare($sql);
        $stsm->execute(['id' => $id , 'status' => $status]);
    }

    // them chi tiet don hang
    public function createOrderDetail($data){
         $sql = "INSERT INTO  order_details(order_id, product_id, price, quantity)
         VALUES(:order_id, :product_id, :price, :quantity)";
           $stsm = $this->conn->prepare($sql);
           $stsm->execute($data);
    }
}