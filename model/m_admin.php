<?php

class AdminDB{
    public static function get_user(){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM admin";
            $statement=$db->prepare($query);
            $statement->execute();
            $admins= $statement->fetchAll();
            return ($admins);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

//    public static function get_book_by_page($start,$limit){
//        $db= Database::getDB();
//        try{
//            $query="SELECT * FROM books LIMIT $start, $limit";
//            $statement=$db->prepare($query);
//            $statement->execute();
//            $books= $statement->fetchAll();
//            return ($books);
//
//        }catch (PDOException $e){
//            $error_message = $e->getMessage();
//            echo "<p>Error connecting to database: $error_message</p>";
//            exit();
//        }
//    }


//    public static function get_book_by_categoryid($id){
//        $db= Database::getDB();
//        try{
//            $query="SELECT * FROM books WHERE categoryID=:categoryID";
//            $statement=$db->prepare($query);
//            $statement->bindValue(':categoryID',$id);
//            $statement->execute();
//            $books= $statement->fetchAll();
//            return ($books);
//
//        }catch (PDOException $e){
//            $error_message = $e->getMessage();
//            echo "<p>Error connecting to database: $error_message</p>";
//            exit();
//        }
//    }

    public static function get_user_by_userid($userID){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM admin WHERE id=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$userID);
            $statement->execute();
            $admins= $statement->fetch();
            $statement->closeCursor();
            return ($admins);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function adduser($user){
        $db= Database::getDB();
        try{
            $query="INSERT INTO admin
                  (username,password,name,level)
                  VALUES (:username,:password,:name,:level)
                    ";
            $statement=$db->prepare($query);
            $statement->bindValue(':username',$user['username']);
            $statement->bindValue(':password',$user['password']);
            $statement->bindValue(':name',$user['name']);
            $statement->bindValue(':level',$user['level']);
            $statement->execute();
            $statement->closeCursor();

            $user_id=$db->lastInsertId();
            return ($user_id);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function deleteuser($userid){
        $db= Database::getDB();
        try{
            $query="DELETE FROM admin WHERE id=:id";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$userid);
            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function updateuser($user){
        $db= Database::getDB();
        try{
            $query="UPDATE admin SET
                  username=?,
                  password=?,
                  name=?,
                  level=?
                  WHERE id=?
                    ";
            $statement=$db->prepare($query);

            $statement->bindParam(1,$user['username']);
            $statement->bindParam(2,$user['password']);
            $statement->bindParam(3,$user['name']);
            $statement->bindParam(4,$user['level']);
            $statement->bindParam(5,$user['id']);

            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

//    public static function search_book($search_value){
//        $db= Database::getDB();
//        $search_value='%'.trim($search_value).'%';
//        try{
//            $query="SELECT * FROM books WHERE Name like ? OR Author like ? OR Summary like ?";
//            $statement=$db->prepare($query);
//
//            $statement->bindParam(1,$search_value);
//            $statement->bindParam(2,$search_value);
//            $statement->bindParam(3,$search_value);
//            $statement->execute();
//            $row_count= $statement->fetchAll();
//            $statement->closeCursor();
//            return ($row_count);
//
//        }catch (PDOException $e){
//            $error_message = $e->getMessage();
//            echo "<p>Error connecting to database: $error_message</p>";
//            exit();
//        }
//
//    }

//    public static function check_bookID($bookID){
//        $db= Database::getDB();
//        try{
//            $query="SELECT * FROM books WHERE bookID=?";
//            $statement=$db->prepare($query);
//            $statement->bindParam(1,$bookID);
//            $statement->execute();
//            $books= $statement->fetch();
//            if(!empty($books)){
//                return true;
//            }else {
//                return false;
//            }
//
//        }catch (PDOException $e){
//            $error_message = $e->getMessage();
//            echo "<p>Error connecting to database: $error_message</p>";
//            exit();
//        }
//    }
}

