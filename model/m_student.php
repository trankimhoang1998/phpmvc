<?php
/*function get_student(){
    global $db;
    try{
        $query="SELECT * FROM students";
        $statement=$db->prepare($query);
        $statement->execute();
        $students= $statement->fetchAll();
        return ($students);

    }catch (PDOException $e){
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message</p>";
        exit();
    }
}

function addstudent($student){
    global $db;
    try{
        $query="INSERT INTO students
                  (CardID,Name,Address,Tel)
                  VALUES (:cardid,:name,:address,:tel)
                    ";
        $statement=$db->prepare($query);
        $statement->bindValue(':cardid',$student['CardID']);
        $statement->bindValue(':name',$student['Name']);
        $statement->bindValue(':address',$student['Address']);
        $statement->bindValue(':tel',$student['Tel']);

        $statement->execute();
        $statement->closeCursor();
        $statement_id=$db->lastInsertId();
        return ($statement_id);

    }catch (PDOException $e){
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message</p>";
        exit();
    }
}

function deletestudent($studentid){
    global $db;
    try{
        $query="DELETE FROM students WHERE CardID=:cardid";
        $statement=$db->prepare($query);
        $statement->bindValue(':cardid',$studentid);
        $row_count= $statement->execute();
        $statement->closeCursor();
        return ($row_count);
    }catch (PDOException $e){
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message</p>";
        exit();
    }
}

function get_student_by_studentid($CardID){
    global $db;
    try{
        $query="SELECT * FROM students WHERE CardID=?";
        $statement=$db->prepare($query);
        $statement->bindParam(1,$CardID);
        $statement->execute();
        $books= $statement->fetch();
        $statement->closeCursor();
        return ($books);

    }catch (PDOException $e){
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message</p>";
        exit();
    }
}


function updatestudent($student){
    global $db;
    try{
        $query="UPDATE students SET
                  Name=?,
                  Address=?,
                  Tel=?
                  WHERE CardID=?
                    ";
        $statement=$db->prepare($query);

        $statement->bindParam(1,$student['Name']);
        $statement->bindParam(2,$student['Address']);
        $statement->bindParam(3,$student['Tel']);
        $statement->bindParam(4,$student['CardID']);


        $row_count= $statement->execute();
        $statement->closeCursor();
        return ($row_count);

    }catch (PDOException $e){
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message</p>";
        exit();
    }
}

function search_student($search_value){
    global $db;
    $search_value='%'.trim($search_value).'%';
    try{
        $query="SELECT * FROM students WHERE Name like ? OR Address like ? OR Tel like ?";
        $statement=$db->prepare($query);

        $statement->bindParam(1,$search_value);
        $statement->bindParam(2,$search_value);
        $statement->bindParam(3,$search_value);
        $statement->execute();
        $row_count= $statement->fetchAll();
        $statement->closeCursor();
        return ($row_count);

    }catch (PDOException $e){
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message</p>";
        exit();
    }

}*/

class StudentDB{
        public static function get_student(){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM students";
            $statement=$db->prepare($query);
            $statement->execute();
            $students= $statement->fetchAll();
            return ($students);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function addstudent($student){
        $db= Database::getDB();
        try{
            $query="INSERT INTO students
                  (CardID,Name,Address,Tel)
                  VALUES (:cardid,:name,:address,:tel)
                    ";
            $statement=$db->prepare($query);
            $statement->bindValue(':cardid',$student['CardID']);
            $statement->bindValue(':name',$student['Name']);
            $statement->bindValue(':address',$student['Address']);
            $statement->bindValue(':tel',$student['Tel']);

            $statement->execute();
            $statement->closeCursor();
            $statement_id=$db->lastInsertId();
            return ($statement_id);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

   public static function deletestudent($studentid){
       $db= Database::getDB();
        try{
            $query="DELETE FROM students WHERE CardID=:cardid";
            $statement=$db->prepare($query);
            $statement->bindValue(':cardid',$studentid);
            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

  public static function get_student_by_studentid($CardID){
      $db= Database::getDB();
        try{
            $query="SELECT * FROM students WHERE CardID=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$CardID);
            $statement->execute();
            $books= $statement->fetch();
            $statement->closeCursor();
            return ($books);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }


   public static function updatestudent($student){
       $db= Database::getDB();
        try{
            $query="UPDATE students SET
                  Name=?,
                  Address=?,
                  Tel=?
                  WHERE CardID=?
                    ";
            $statement=$db->prepare($query);

            $statement->bindParam(1,$student['Name']);
            $statement->bindParam(2,$student['Address']);
            $statement->bindParam(3,$student['Tel']);
            $statement->bindParam(4,$student['CardID']);


            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function search_student($search_value){
        $db= Database::getDB();
        $search_value='%'.trim($search_value).'%';
        try{
            $query="SELECT * FROM students WHERE Name like ? OR Address like ? OR Tel like ?";
            $statement=$db->prepare($query);

            $statement->bindParam(1,$search_value);
            $statement->bindParam(2,$search_value);
            $statement->bindParam(3,$search_value);
            $statement->execute();
            $row_count= $statement->fetchAll();
            $statement->closeCursor();
            return ($row_count);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }

    }


    public static function check_cardID($cardID){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM students WHERE CardID=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$cardID);
            $statement->execute();
            $student= $statement->fetch();
           // $statement->closeCursor();
            if(!empty($student)){
                return true;
            }else {
                return false;
            }
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }
}


