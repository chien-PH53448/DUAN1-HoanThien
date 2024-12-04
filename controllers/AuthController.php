<?php
class AuthController{
    //đăng kí
    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST;
           //mã hóa mk
           $password = $_POST['password'];
           $password = password_hash($password, PASSWORD_DEFAULT);
           //đưa vào data
           $data['password'] = $password;
           //insert vào data
           (new User)->create($data);
           //thông báo
           $_SESSION['message'] = 'Đăng ký thành công';
           header("Location: " . ROOT_URL . "?ctl=login");
           die;
        }
        return view('clients.user.register');
    }

    public function login(){
        //ktra người dùng đang nhập chưa
        if(isset($_SESSION['user'])){
            header("location: " . ROOT_URL);
            die;
        }
        $error=null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user=(new User)->findMail($email);
            //ktra mk
            // var_dump($user);
            if($user){
                if(password_verify($password, $user['password'])){
                    $_SESSION['user']=$user;
                    //nếu role =1 là admin, ngược lại
                    if($user['role']=='admin'){
                        header("Location: " . ADMIN_URL);
                        die;
                    }
                    header("Location: " . ROOT_URL );
                    die;
                }else{
                    $error="Email hoặc mật khẩu không chính xác";
                }
            }else{
                $error="Email hoặc mật khẩu không chính xác";
            }
        }
        $message = session_flash('message');
        return view('clients.user.login', compact('message','error'));
    }
    //đăng xuất
    public function logout(){
        unset($_SESSION['user']);
        header('Location:' . ROOT_URL . '?ctl=login');
        die;
    }

    public function index(){
        $users = (new User)->all();
        return view('admin.users.list' , compact('users'));
    }

    public function updateActive(){
        $data = $_POST;
        $data['active'] = $data['active'] ? 0 : 1;
        (new User)->updateActive($data['id'], $data['active']);
        return header('Location: ' . ADMIN_URL . '?ctl=listuser');
    }
}

?>