<?php
ob_start();
$lifetime=2*60*60;
$path='/';
session_set_cookie_params($lifetime,$path);
session_start();

include_once ('model/database.php');
include_once ('model/m_book.php');
include_once ('model/m_category.php');
include_once ('model/m_student.php');
include_once ('model/m_login.php');


$controller=filter_input(INPUT_POST,"controller");

if (empty($controller)){
    $controller=filter_input(INPUT_GET,"controller");
    if (empty($controller)){
        $controller="login";
    }

}

if (!isset($_SESSION['admin']['username'])||!isset($_SESSION['admin']['password'])){
    include('controller/c_login.php');
}else{
    switch ($controller){
        case 'main':
            $username=$_SESSION['admin']['username'];
            $list_user=Admin_DB::get_user_by_username($username);
            include ('view/main/master.php');
            break;
        case 'login':
            include ('controller/c_login.php');
            break;
        case 'admin':
            include ('controller/c_admin.php');
            break;
        case 'book':
            include ('controller/c_book.php');
            break;
        case 'student':
            include ('controller/c_student.php');
            break;
        case 'category':
            include ('controller/c_category.php');
            break;
        case 'receipt':
            include ('controller/c_receipt.php');
            break;
        default:
            break;
    }
}





//include ('controller/c_book.php');