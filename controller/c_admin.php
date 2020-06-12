<?php
include_once ('model/database.php');
include_once ('model/m_book.php');
include_once ('model/m_category.php');
include_once ('model/m_admin.php');



$action= filter_input(INPUT_POST,"action");
if(empty($action)){
    $action=filter_input(INPUT_GET,'action');
    if (empty($action)){
        $action='show admin';
    }
}

switch ($action){
    case 'show admin':
        $AdminDB = new AdminDB();
        $list_users= $AdminDB->get_user();
        include('view/user/list_user.php');
        break;
    case 'add_new':
        include('view/user/adduser.php');
        break;

    case 'save_user':

        $user = array();
        $user['username'] = filter_input(INPUT_POST, 'username');
        $user['password'] = md5(filter_input(INPUT_POST, 'password'));
        $user['name'] = filter_input(INPUT_POST, 'name');
        $user['level'] = filter_input(INPUT_POST, 'level');

        $AdminDB = new AdminDB();
        $AdminDB->adduser($user);
        $list_users= $AdminDB->get_user();
        include('view/user/list_user.php');
        break;


    case 'delete':
        $userid = filter_input(INPUT_GET, 'userid');
        $AdminDB = new AdminDB();
        $AdminDB->deleteuser($userid);
        $list_users= $AdminDB->get_user();
        include('view/user/list_user.php');
        break;

    case 'edit':
        $userid = filter_input(INPUT_GET, 'userid');
        $AdminDB = new AdminDB();
        $list_users= $AdminDB->get_user_by_userid($userid);
        include ('view/user/edit_user.php');
        break;

    case 'save_edit':

        $user = array();
        $user['id']= filter_input(INPUT_POST, 'id');
        $user['username']= filter_input(INPUT_POST, 'username');
        $user['password']= md5(filter_input(INPUT_POST, 'password'));
        $user['name']= filter_input(INPUT_POST, 'name');
        $user['level']= filter_input(INPUT_POST, 'level');


        $AdminDB = new AdminDB();
        $AdminDB->updateuser($user);
        $list_users= $AdminDB->get_user();
        include('view/user/list_user.php');
        break;

    default:
        break;
}
