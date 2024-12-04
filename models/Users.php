<?php
class User extends BaseModel{
    //lấy ra toàn bộ user
    public function all(){
        $sql="SELECT * FROM taikhoan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //lấy ra 1 user
    public function find($id){
        $sql = "SELECT * FROM taikhoan WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=> $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //lấy ra 1 user theo mail
    public function findMail($email){
        $sql = "SELECT * FROM taikhoan WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=> $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //thêm 1 user
    public function create($data){
        $sql = "INSERT INTO taikhoan (name, email, password, sdt, diachi) VALUES (:name, :email, :password, :sdt, :diachi)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    //cập nhật user
    public function update($id, $data){
        $sql = "UPDATE taikhoan SET name = :name,   sdt = :sdt, diachi = :diachi, role = :role, active=:active Where id=:id";
        $stmt = $this->conn->prepare($sql);
        //thêm id vào data
        $data['id']=$id;
        
        $stmt->execute($data);

    }

    // cap nhat trang thai
    public function updateActive($id, $active){
        $sql ="UPDATE  taikhoan SET active=:active WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id, 'active'=>$active]);
    }
}
?>