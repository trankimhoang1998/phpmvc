<?php
include_once ('model/database.php');
include_once ('model/m_book.php');
include_once ('model/m_category.php');
include_once ('model/m_student.php');
include_once ('model/m_login.php');



$action= filter_input(INPUT_POST,"action");
if(empty($action)){
    $action=filter_input(INPUT_GET,'action');
    if (empty($action)){
        $action='check_session';
    }
}
switch ($action){

    case 'check_session':
        if(isset($_SESSION['admin'])){
            $user=array('username'=>$_SESSION['admin']['username'],'password'=>$_SESSION['admin']['password']);
            if(Admin_DB::check_login($user)){
                $list_user=Admin_DB::get_user_by_username($username);
                include ('view/main/master.php');
            }

        }
        else{
            include_once ("view/main/login.php");
        }

        break;

    case 'check_login':
        $username=filter_input(INPUT_POST,"username");
        $password=md5(filter_input(INPUT_POST,"password"));
        $user=array('username'=>$username,'password'=>$password);

        if(Admin_DB::check_login($user)){
            $_SESSION['admin']['username']=$username;
            $_SESSION['admin']['password']=$password;

            $list_user=Admin_DB::get_user_by_username($username);

            //echo 'đăng nhập thành công';
            include ("view/main/master.php");
        }else{
            echo 'user or pass invalid';
            include_once ("view/main/login.php");
        }
        break;

    case 'logout':
        unset($_SESSION['admin']);
        include_once ("view/main/login.php");
        break;
    default:
        break;
}

