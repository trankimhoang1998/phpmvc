<?php
include_once ('model/database.php');
include_once ('model/m_book.php');
include_once ('model/m_category.php');
include_once ('model/m_student.php');


$action= filter_input(INPUT_POST,"action");
if(empty($action)){
    $action=filter_input(INPUT_GET,'action');
    if (empty($action)){
        $action='show student';
    }
}
switch ($action){
    case 'show student':
        $studentDB=new StudentDB();
        $list_students= $studentDB->get_student();
        include('view/student/list_students.php');
        break;
    case 'add_new':
        include('view/student/addstudent.php');
        break;
    case 'save_student':
        $student = array();

        $student['CardID'] = filter_input(INPUT_POST, 'cardid');
        $student['Name'] = filter_input(INPUT_POST, 'name');
        $student['Address'] = filter_input(INPUT_POST, 'address');
        $student['Tel'] = filter_input(INPUT_POST, 'tel');
        $studentDB=new StudentDB();
        $studentDB->addstudent($student);
        $list_students= $studentDB->get_student();
        include('view/student/list_students.php');
        break;
    case 'delete':
        $student_id = filter_input(INPUT_GET, 'student_id');
        $studentDB=new StudentDB();
        $studentDB->deletestudent($student_id);
        $list_students= $studentDB->get_student();
        include('view/student/list_students.php');
        break;
    case 'edit':
        $student_id = filter_input(INPUT_GET, 'student_id');
        $studentDB=new StudentDB();
        $list_students= $studentDB->get_student_by_studentid($student_id);
        include ('view/student/editstudent.php');
        break;


    case 'save_edit':
        $student = array();
        $student['CardID']= filter_input(INPUT_POST, 'cardid');
        $student['Name']= filter_input(INPUT_POST, 'name');
        $student['Address']= filter_input(INPUT_POST, 'address');
        $student['Tel']= filter_input(INPUT_POST, 'tel');
        $studentDB=new StudentDB();
        $studentDB->updatestudent($student);
        $list_students= $studentDB->get_student();
        include('view/student/list_students.php');
        break;

    case 'search_student':
        $search_value=filter_input(INPUT_POST, 'search_value');
        $studentDB=new StudentDB();
        $list_students= $studentDB->search_student($search_value);
        include('view/student/list_students.php');
        break;

    default:
        break;
}

