<?php

function view($view, $data = [])
{
    extract($data);

    $view = str_replace('.', '/', $view);
    include_once ROOT_DIR . "views/$view.php";
}

//hàm dd dùng để debug 
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function session_flash($key){
    $message = $_SESSION[$key] ?? '';
    unset($_SESSION[$key]);
    return $message;

}


// chuyển đổi trạng thái
function getOrderStatus($status){
    $status_details = [
     1 => 'chờ xử lý',
     2 => 'đang xử lý',
     3 => 'Hoàn thành',
     4 => 'Đã huỷ',
    ];
    return $status_details[$status];
}