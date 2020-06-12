<?php

$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
//$lifetime = 0;                      // per-session cookie
session_set_cookie_params($lifetime, '/');
session_start();

include_once ('model/database.php');
include_once ('model/m_book.php');
include_once ('model/m_category.php');
include_once ('model/m_receipt.php');
include_once ('model/m_student.php');


$action= filter_input(INPUT_POST,"action");
if(empty($action)){
    $action=filter_input(INPUT_GET,'action');
    if (empty($action)){
        $action='show receipt';
    }
}
$cardID="";
$message_error="";
$student=array(
    'CardID'=>'',
    'Name'=>'',
    'Address'=>'',
    'Tel'=>''
);

switch ($action){
    case 'show receipt':
        $cardID=filter_input(INPUT_GET, 'cardID');
        include('view/receipts/receipt_book.php');
        break;

    case 'add_borrow_book':
        $cardID=filter_input(INPUT_POST, 'cardid');
        $bookID=filter_input(INPUT_POST, 'bookid');

        $bookDB=new BookDB();
        $book=$bookDB->get_book_by_bookid($bookID);
        $dateborrow= date('Y-m-d H:i:s');

        if (StudentDB::check_cardID($cardID)){

            $student=StudentDB::get_student_by_studentid($cardID);

            if (BookDB::check_bookID($bookID)){

        $_SESSION[$cardID][]=array(
            'bookid'=>$book['BookID'],
            'name'=>$book['Name'],
            'publisher'=>$book['Publisher'],
            'author'=>$book['Author'],
            'dateborrow'=>$dateborrow
        );
            }
            else{
                $message_error="* BookID $bookID khong ton tai";
            }

        }else{
            $message_error="* CardID $cardID khong ton tai";
        }


        include('view/receipts/receipt_book.php');
        break;

    case 'delete':
        $cardID=filter_input(INPUT_GET, 'cardID');
        $id=filter_input(INPUT_GET, 'id');

        unset($_SESSION[$cardID][$id]);
        include('view/receipts/receipt_book.php');
        break;

    case 'receipt_book':

        $cardID=filter_input(INPUT_POST, 'cardID');
        $dateborrow= date('Y-m-d H:i:s');

        foreach ($_SESSION[$cardID] as $key => $value){
            $receipt=array(
                'CardID'=>$cardID,
                'BookID'=>$value['bookid'],
                'DateBorrow'=>$dateborrow
            );
            ReceiptBD::receipt_book($receipt);
        }

        unset($_SESSION[$cardID]);

        include('view/receipts/receipt_book.php');
        break;

    default:
        break;
}


