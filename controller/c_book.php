<?php
include_once ('model/database.php');
include_once ('model/m_book.php');
include_once ('model/m_category.php');


$action= filter_input(INPUT_POST,"action");
if(empty($action)){
    $action=filter_input(INPUT_GET,'action');
    if (empty($action)){
        $action='show book';
    }
}

switch ($action){
    case 'show book':
        $BookDB = new BookDB();
        $list_books= $BookDB->get_book();

        $total_records=count($list_books);//tổng số mẫu tin
        $limit=5;//số mẫu tin hiển thị trên một trang
        $total_pages=(int)ceil($total_records/$limit);
        $current_page=filter_input(INPUT_GET,"page");
        if (empty($current_page)){
            $current_page=1;
        }
        $start=($current_page-1)*$limit;
        $list_books= $BookDB->get_book_by_page($start,$limit);
        include('view/book/list_books.php');
        break;
    case 'add_new':
        $CategoryDB= new CategoryDB();
        $list_categories= $CategoryDB->get_categories();
        include('view/book/addbook.php');
        break;

    case 'save_book':


        $bookid = filter_input(INPUT_POST, 'bookid');
        $name = filter_input(INPUT_POST, 'name');
        $publisher = filter_input(INPUT_POST, 'publisher');
        $author = filter_input(INPUT_POST, 'author');
        $categoryid = filter_input(INPUT_POST, 'categoryid');
        $numbofpage = filter_input(INPUT_POST, 'numbofpage');
        $maxdate = filter_input(INPUT_POST, 'maxdate');
        $num = filter_input(INPUT_POST, 'num');
        $summary = filter_input(INPUT_POST, 'summary');
        //$picture = filter_input(INPUT_POST, 'picture');

        //xử lý lưu ảnh trên server

         $image_dir_path=getcwd().'/public/images';
        if (isset($_FILES['picture'])){
            $filename=$_FILES['picture']['name'];
            if (!empty($filename)){
                $source=$_FILES['picture']['tmp_name'];
                $target=$image_dir_path.'/'.$filename;
                move_uploaded_file($source,$target);
                $picture=$filename;
            }
        }
        else{
            $picture='';
        }
        $BookDB = new BookDB();
        $BookDB->addbook($bookid,$name,$publisher,$author,$categoryid,$numbofpage,$maxdate,$num,$summary,$picture);
        $list_books= $BookDB->get_book();
        $CategoryDB= new CategoryDB();
        $list_categories= $CategoryDB->get_categories();

        $total_records=count($list_books);//tổng số mẫu tin
        $limit=5;//số mẫu tin hiển thị trên một trang
        $total_pages=(int)ceil($total_records/$limit);
        $current_page=filter_input(INPUT_GET,"page");
        if (empty($current_page)){
            $current_page=1;
        }
        $start=($current_page-1)*$limit;
        $list_books= $BookDB->get_book_by_page($start,$limit);

        include ('view/book/list_books.php');
        break;
    case 'delete':
        $book_id = filter_input(INPUT_GET, 'book_id');
        $BookDB = new BookDB();
        $CategoryDB= new CategoryDB();
        $BookDB->deletebook($book_id);
        $list_books= $BookDB->get_book();
        $list_categories= $CategoryDB->get_categories();

        $total_records=count($list_books);//tổng số mẫu tin
        $limit=5;//số mẫu tin hiển thị trên một trang
        $total_pages=(int)ceil($total_records/$limit);
        $current_page=filter_input(INPUT_GET,"page");
        if (empty($current_page)){
            $current_page=1;
        }
        $start=($current_page-1)*$limit;
        $list_books= $BookDB->get_book_by_page($start,$limit);

        include ('view/book/list_books.php');
        break;
    case 'edit':
        $book_id = filter_input(INPUT_GET, 'book_id');
        $BookDB = new BookDB();
        $CategoryDB= new CategoryDB();
        $list_books= $BookDB->get_book_by_bookid($book_id);
        $list_categories= $CategoryDB->get_categories();
        include ('view/book/editbook.php');
        break;
    case 'save_edit':
       /* $bookid = filter_input(INPUT_POST, 'bookid');
        $name = filter_input(INPUT_POST, 'name');
        $publisher = filter_input(INPUT_POST, 'publisher');
        $author = filter_input(INPUT_POST, 'author');
        $categoryid = filter_input(INPUT_POST, 'categoryid');
        $numbofpage = filter_input(INPUT_POST, 'numbofpage');
        $maxdate = filter_input(INPUT_POST, 'maxdate');
        $num = filter_input(INPUT_POST, 'num');
        $summary = filter_input(INPUT_POST, 'summary');
        $picture = filter_input(INPUT_POST, 'picture');*/

       $book = array();
       $book['BookID']= filter_input(INPUT_POST, 'bookid');
       $book['Name']= filter_input(INPUT_POST, 'name');
       $book['Publisher']= filter_input(INPUT_POST, 'publisher');
       $book['Author']= filter_input(INPUT_POST, 'author');
       $book['Categoryid']= filter_input(INPUT_POST, 'categoryid');
       $book['Numbofpage']= filter_input(INPUT_POST, 'numbofpage');
       $book['Maxdate']= filter_input(INPUT_POST, 'maxdate');
       $book['Num']= filter_input(INPUT_POST, 'num');
       $book['Summary']= filter_input(INPUT_POST, 'summary');
       $book['Picture'] = filter_input(INPUT_POST, 'old_picture');
        //xử lý lưu ảnh trên server

        $image_dir_path=getcwd().'/public/images';
        if (isset($_FILES['picture'])){
            $filename=$_FILES['picture']['name'];
            if (!empty($filename)){
                $source=$_FILES['picture']['tmp_name'];
                $target=$image_dir_path.'/'.$filename;
                move_uploaded_file($source,$target);
                $book['Picture']=$filename;
            }
        }

       // print_r($book);
        $BookDB = new BookDB();
        $CategoryDB= new CategoryDB();
        $BookDB->updatebook($book);
        $list_books= $BookDB->get_book();
        $list_categories= $CategoryDB->get_categories();

        $total_records=count($list_books);//tổng số mẫu tin
        $limit=5;//số mẫu tin hiển thị trên một trang
        $total_pages=(int)ceil($total_records/$limit);
        $current_page=filter_input(INPUT_GET,"page");
        if (empty($current_page)){
            $current_page=1;
        }
        $start=($current_page-1)*$limit;
        $list_books= $BookDB->get_book_by_page($start,$limit);


        include('view/book/list_books.php');
        break;

    case 'search_book':
        $BookDB = new BookDB();
        $search_value=filter_input(INPUT_POST, 'search_value');
        $list_books= $BookDB->search_book($search_value);

        $total_records=count($list_books);//tổng số mẫu tin
        $limit=5;//số mẫu tin hiển thị trên một trang
        $total_pages=(int)ceil($total_records/$limit);
        $current_page=filter_input(INPUT_GET,"page");
        if (empty($current_page)){
            $current_page=1;
        }


        include('view/book/list_books.php');
        break;


    default:
        break;
}
