<?php
include_once ('model/database.php');
include_once ('model/m_book.php');
include_once ('model/m_category.php');
include_once ('model/m_student.php');


$action= filter_input(INPUT_POST,"action");
if(empty($action)){
    $action=filter_input(INPUT_GET,'action');
    if (empty($action)){
        $action='show category';
    }
}
switch ($action){
    case 'show category':
        $CategoryDB=new CategoryDB();
        $list_category= $CategoryDB->get_categories();
        include('view/category/list_category.php');
        break;
    case 'add_new':
        include('view/category/addcategory.php');
        break;
    case 'save_category':
        $category = array();

        $category['CategoryID'] = filter_input(INPUT_POST, 'CategoryID');
        $category['CategoryName'] = filter_input(INPUT_POST, 'CategoryName');
        $category['MoreInfo'] = filter_input(INPUT_POST, 'MoreInfo');

        $CategoryDB=new CategoryDB();
        $CategoryDB->addcategory($category);
        $list_category= $CategoryDB->get_categories();
        include('view/category/list_category.php');
        break;
    case 'delete':
        $category_id = filter_input(INPUT_GET, 'category_id');
        $CategoryDB=new CategoryDB();
        $CategoryDB->deletecategory($category_id);
        $list_category= $CategoryDB->get_categories();
        include('view/category/list_category.php');
        break;
    case 'edit':
        $category_id = filter_input(INPUT_GET, 'category_id');
        $CategoryDB=new CategoryDB();
        $list_category= $CategoryDB->get_category_by_categoryid($category_id);
        include('view/category/editcategory.php');
        break;


    case 'save_edit':
        $category = array();
        $category['CategoryID']= filter_input(INPUT_POST, 'CategoryID');
        $category['CategoryName']= filter_input(INPUT_POST, 'CategoryName');
        $category['MoreInfo']= filter_input(INPUT_POST, 'MoreInfo');

        $CategoryDB=new CategoryDB();
        $CategoryDB->updatecategory($category);
        $list_category= $CategoryDB->get_categories();
        include('view/category/list_category.php');
        break;

    case 'search_category':
        $search_value=filter_input(INPUT_POST, 'search_value');
        $CategoryDB=new CategoryDB();
        $list_category= $CategoryDB->search_category($search_value);
        include('view/category/list_category.php');
        break;

    default:
        break;
}

